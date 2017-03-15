<?php
namespace SpcAuth\Auth;
use Cake\Controller\ComponentRegistry;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use FOC\Authenticate\Auth\CookieAuthenticate;

/**
 * An authentication adapter for AuthComponent
 *
 * Provides the ability to authenticate using COOKIE
 *
 * ```
 *    $this->Auth->config('authenticate', [
 *        'Authenticate.Cookie' => [
 *            'fields' => [
 *                'username' => 'username',
 *                'password' => 'password'
 *             ],
 *            'userModel' => 'Users',
 *            'scope' => ['Users.active' => 1],
 *            'crypt' => 'aes',
 *            'cookie' => [
 *                'name' => 'RememberMe',
 *                'time' => '+2 weeks',
 *            ]
 *        ]
 *    ]);
 * ```
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */
class SPCCookieAuthenticate extends CookieAuthenticate
{

    /**
     * Constructor
     *
     * @param \Cake\Controller\ComponentRegistry $registry The Component registry
     *   used on this request.
     * @param array $config Array of config to use.
     */

    public function __construct(ComponentRegistry $registry, $config)
    {
        parent::__construct($registry, $config);
    }

    protected function _findUser($username, $password = null)
    {
        $userModel = $this->_config['userModel'];
        list($plugin, $model) = pluginSplit($userModel);
        $fields = $this->_config['fields'];
        $conditions = [$model . '.' . $fields['username'] => $username];

        $columns = [];
        foreach ($this->_config['columns'] as $column) {
            $columns[] = [$model . '.' . $column => $username];
        }
        $conditions = ['OR' => $columns];

        if (!empty($this->_config['scope'])) {
            $conditions = array_merge($conditions, $this->_config['scope']);
        }

        $table = TableRegistry::get($userModel)->find('all');
        if ($this->_config['contain']) {
            $table = $table->contain($this->_config['contain']);
        }

        $result = $table
            ->where($conditions)
            ->hydrate(false)
            ->first();
        if (empty($result)) {
            return false;
        }

        if ($password !== null) {
            $hasher = $this->passwordHasher();
            $hashedPassword = $result[$fields['password']];
            if (!$hasher->check($password, $hashedPassword)) {
                return false;
            }

            $this->_needsPasswordRehash = $hasher->needsRehash($hashedPassword);
            unset($result[$fields['password']]);
        }

        return $result;
    }
    public function logout(Event $event, array $user)
    {
        $this->_registry->Cookie->delete($this->_config['cookie']['name']);
    }
    public function implementedEvents()
    {
        return ['Auth.logout' => 'logout'];
    }
}
