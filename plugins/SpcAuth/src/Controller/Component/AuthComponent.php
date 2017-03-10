<?php

namespace SpcAuth\Controller\Component;

use Cake\Cache\Cache;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Component\AuthComponent as CakeAuthComponent;
use Cake\Core\Configure;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use SpcAuth\Utility\Utility;

/**
 * SpcAuth AuthComponent to handle all authentication in a central ini file.
 */
class AuthComponent extends CakeAuthComponent {

	/**
	 * @var array
	 */
	protected $_defaultSpcAuthConfig = [
	    'mode'=>true,
		'cache' => '_cake_core_',
        'idColumn' => 'id',
		'cacheKey' => 'spc_auth_allow',
		'cacheKeyAcl' => 'spc_auth_acl',
        'multiRole' => false,
		'autoClearCache' => false, // Set to true to delete cache automatically in debug mode
		'filePath' => null, // Possible to locate ini file at given path e.g. Plugin::configPath('Admin')
		'file' => 'auth_allow.ini',
		'file_alc' => 'acl.ini',
        'pivotTable' => null, // Should be used in multi-roles setups
		'rolesTable' => 'Roles',// name of Configure key holding available roles OR class name of roles table
        'usersTable' => 'Users',
        'roleColumn' => 'role_id', // Foreign key for the Role ID in users table or in pivot table
		'userColumn' => 'user_id', // Foreign key for the User id in pivot table. Only for multi-roles setup
		'aliasColumn' => 'name',// Name of column in roles table holding role alias/slug
	];

	/**
	 * @param \Cake\Controller\ComponentRegistry $registry
	 * @param array $config
	 * @throws \Cake\Core\Exception\Exception
	 */
	public function __construct(ComponentRegistry $registry, array $config = []) {
		$config += $this->_defaultSpcAuthConfig;
		parent::__construct($registry, $config);
		if (!in_array($config['cache'], Cache::configured())) {

			throw new Exception(sprintf('Invalid SpcAuth cache `%s`', $config['cache']));
		}

	}

	/**
	 * @param \Cake\Event\Event $event Event instance.
	 * @return \Cake\Network\Response|null
	 */
	public function startup(Event $event) {
        if($this->_config['mode']){
            $this->_prepareAuthentication();
        }

		return parent::startup($event);

	}

	/**
	 * @return void
	 */
	protected function _prepareAuthentication() {
		$authentication = $this->_getAuth($this->_config['filePath']);
		$params = $this->request->params;
		foreach ($authentication as $rule) {
			if ($params['plugin'] && $params['plugin'] !== $rule['plugin']) {
				continue;
			}
			if (!empty($params['prefix']) && $params['prefix'] !== $rule['prefix']) {
				continue;
			}
			if ($params['controller'] !== $rule['controller']) {
				continue;
			}

			if ($rule['actions'] === []) {
				$this->allow();
				return;
			}

			$this->allow($rule['actions']);
		}
	}

	/**
	 * Parse ini file and returns the allowed actions.
	 *
	 * Uses cache for maximum performance.
	 *
	 * @param string|null $path
	 * @return array Actions
	 */
	protected function _getAuth($path = null) {
		if ($path === null) {
			$path = ROOT . DS . 'config' . DS;
		}

		if ($this->_config['autoClearCache'] && Configure::read('debug')) {
			Cache::delete($this->_config['cacheKey'], $this->_config['cache']);
		}
		$roles = Cache::read($this->_config['cacheKey'], $this->_config['cache']);
		if ($roles !== false) {
			return $roles;
		}

		$iniArray = Utility::parseFile($path . $this->_config['file']);

		$res = [];
		foreach ($iniArray as $key => $actions) {
			$res[$key] = Utility::deconstructIniKey($key);
			$res[$key]['map'] = $actions;

			$actions = explode(',', $actions);

			if (in_array('*', $actions)) {
				$res[$key]['actions'] = [];
				continue;
			}

			foreach ($actions as $action) {
				$action = trim($action);
				if (!$action) {
					continue;
				}

				$res[$key]['actions'][] = $action;
			}
		}

		Cache::write($this->_config['cacheKey'], $res, $this->_config['cache']);
		return $res;
	}

	public function getACL($availableRoles = null,$path = null){
        if ($path === null) {
            $path = ROOT . DS . 'config' . DS;
        }

        if ($this->_config['autoClearCache'] && Configure::read('debug')) {
            Cache::delete($this->_config['cacheKeyAcl'], $this->_config['cache']);
        }
        $roles = Cache::read($this->_config['cacheKeyAcl'], $this->_config['cache']);
        if ($roles !== false) {
            return $roles;
        }

        $iniArray = Utility::parseFile($path . $this->_config['file_alc']);

		if ($availableRoles === null) {
			$availableRoles = $this->_getAvailableRoles();
		}
        $res = [];
//        print_r($this->_getUserRoles());exit;
		foreach ($iniArray as $key => $array) {

			$tempRes = Utility::deconstructIniKey($key);
			$res[$tempRes['controller']] =$tempRes;
			$res[$tempRes['controller']]['map'] = array('controllers' => $key ,'actions' => $array['actions']);
			foreach ($array as $actions => $roles) {
				// Get all roles used in the current ini section
				$roles = explode(',', $roles);
				if($actions === 'actions' ){
					$tempActions = [];
					foreach($roles as $act) {
						list($k, $v) = explode('|', $act);
						$tempActions[ $k ] = $v;
					}
					$res[$tempRes['controller']]['roles'] = $tempActions;
					continue;
				}
				$actions = explode(',', $actions);
				foreach ($roles as $roleId => $role) {
					$role = trim($role);
					if (!$role) {
						continue;
					}
					// Prevent undefined roles appearing in the iniMap
					if (!array_key_exists($role, $availableRoles) && $role !== '*') {
						unset($roles[$roleId]);
						continue;
					}
					if ($role === '*') {
						unset($roles[$roleId]);
						$roles = array_merge($roles, array_keys($availableRoles));
					}
				}

				foreach ($actions as $action) {
					$action = trim($action);
					if (!$action) {
						continue;
					}

					foreach ($roles as $role) {
						$role = trim($role);
						if (!$role || $role === '*') {
							continue;
						}
						// Lookup role id by name in roles array
						$newRole = $availableRoles[strtolower($role)];
						$res[$tempRes['controller']]['actions'][$action][] = $newRole;
					}
				}

			}
        }
        Cache::write($this->_config['cacheKeyAcl'], $res, $this->_config['cache']);
        return $res;
    }
    public function getActionByRoles($userRoles){
        $userRoles = $this->_getUserRoles($userRoles);
        $result =[];
        $acls = $this->getACL();
//        return $userRoles;exit;
        foreach ($acls as $key => $acl){
            if(isset($acl['actions']['*'])){
                $matchArray = $acl['actions']['*'];
                foreach ($userRoles as $userRole) {
                    if (in_array($userRole, $matchArray)) {
                        $result[$key][] = '*';
                        break;
                    }
                }
                if(isset($result[$key]) && count($result[$key])>0)
                    continue;
            }
            foreach ($acl['actions'] as $action => $role){
                if($action === '*'){
                    continue;
                }
                foreach ($userRoles as $userRole) {
                    if (in_array($userRole, $role)) {
                        $result[$key][] = $action;
                        break;
                    }
                }
            }
        }
        return $result;
    }

    /**
     * Returns a list of all available roles.
     *
     * Will look for a roles array in
     * Configure first, tries database roles table next.
     *
     * @return array List with all available roles
     * @throws \Cake\Core\Exception\Exception
     */
    protected function _getAvailableRoles() {
        $roles = Configure::read($this->_config['rolesTable']);
        if (is_array($roles)) {
            return $roles;
        }

        $rolesTable = TableRegistry::get($this->_config['rolesTable']);

        $roles = $rolesTable->find()->formatResults(function ($results) {
            return $results->combine($this->_config['aliasColumn'], 'id');
        })->toArray();
        if (count($roles) < 1) {
            throw new Exception('Invalid SpcAuth role setup (roles table `' . $this->_config['rolesTable'] . '` has no roles)');
        }
        return $roles;
    }
    /**
     * Returns a list of all roles belonging to the authenticated user.
     *
     * Lookup in the following order:
     * - single role id using the roleColumn in single-role mode
     * - direct lookup in the pivot table (to support both Configure and Model
     *   in multi-role mode)
     *
     * @param array $user The user to get the roles for
     * @return array List with all role ids belonging to the user
     * @throws \Cake\Core\Exception\Exception
     */
    protected function _getUserRoles($user) {
        // Single-role
        if (!$this->_config['multiRole']) {
            if (isset($user[$this->_config['roleColumn']])) {
                return [$user[$this->_config['roleColumn']]];
            }
            throw new Exception(sprintf('Missing SpcAuth role id (%s) in user session', $this->_config['roleColumn']));
        }
//        echo 123;exit;
        // Multi-role case : load the pivot table
        $pivotTableName = $this->_config['pivotTable'];
        if (!$pivotTableName) {
            list(, $rolesTableName) = pluginSplit($this->_config['rolesTable']);
            list(, $usersTableName) = pluginSplit($this->_config['usersTable']);
            $tables = [
                $usersTableName,
                $rolesTableName
            ];
            asort($tables);
            $pivotTableName = implode('', $tables);
        }
        $pivotTable = TableRegistry::get($pivotTableName);
//        print_r($pivotTable);exit;
        $roleColumn = $this->_config['roleColumn'];
        $roles = $pivotTable->find()
            ->select($roleColumn)
            ->where([$this->_config['userColumn'] => $user[$this->_config['idColumn']]])
            ->all()
            ->extract($roleColumn)
            ->toArray();
        if (!count($roles)) {
//            print_r($pivotTableName);exit;
//            throw new Exception('Missing SpcAuth roles for user in pivot table');
        }

        return $roles;
    }
}
