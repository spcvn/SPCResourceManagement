<?php
/**
 *
 * Copyright (c) Son Nguyen
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Son Nguyen
 * @link          Project
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Notification\Controller\Component;
use Cake\Core\Configure;
use Notification\Utility\NotificationManager;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
/**
 * Notification component
 */
class NotificationComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'UsersModel' => 'Users'
    ];
    protected  $_templateList = [
        'default' => 'Default'
    ];
    /**
     * The controller.
     *
     * @var \Cake\Controller\Controller
     */
    private $Controller = null;
    /**
     * initialize
     *
     * @param array $config Config.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->Controller = $this->_registry->getController();
    }
    /**
     * setController
     *
     * Setter for the Controller property.
     *
     * @param \Cake\Controller\Controller $controller Controller.
     * @return void
     */
    public function setController($controller)
    {
        $this->Controller = $controller;
    }
    /**
     * getNotifications
     *
     * Returns a list of notifications.
     *
     * ### Examples
     * ```
     *  // if the user is logged in, this is the way to get all notifications
     *  $this->Notification->getNotifications();
     *
     *  // for a specific user, use the first parameter for the user_id
     *  $this->Notification->getNotifications(1);
     *
     *  // default all notifications are returned. Use the second parameter to define read / unread:
     *
     *  // get all unread notifications
     *  $this->Notification->getNotifications(1, true);
     *
     *  // get all read notifications
     *  $this->Notification->getNotifications(1, false);
     * ```
     * @param int|null $userId Id of the user.
     * @param bool|null $state The state of notifications: `true` for unread, `false` for read, `null` for all.
     * @return array
     */
    public function getNotifications($userId = null, $tracking_id =null, $state = null ,$limit = null )
    {
        if (!$userId) {
            $userId = $this->Controller->Auth->user('id');
        }
        $model = TableRegistry::get('Notification.Notifications');
        $query = $model->find('all')->autoFields(true)->where(['Notifications.user_id' => $userId])->order(['created' => 'desc']);
        if (!is_null($state)) {
            $query->where(['Notifications.state' => $state]);
        }
        if (!is_null($tracking_id)) {
            $query->where(['Notifications.tracking_id' => $tracking_id]);
        }
        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query->toArray();
    }
    /**
     * countNotifications
     *
     * Returns a number of notifications.
     *
     * ### Examples
     * ```
     *  // if the user is logged in, this is the way to count all notifications
     *  $this->Notification->countNotifications();
     *
     *  // for a specific user, use the first parameter for the user_id
     *  $this->Notification->countNotifications(1);
     *
     *  // default all notifications are counted. Use the second parameter to define read / unread:
     *
     *  // count all unread notifications
     *  $this->Notification->countNotifications(1, true);
     *
     *  // count all read notifications
     *  $this->Notification->countNotifications(1, false);
     * ```
     * @param int|null $userId Id of the user.
     * @param bool|null $state The state of notifications: `true` for unread, `false` for read, `null` for all.
     * @return int
     */
    public function countNotifications($userId = null, $state = null)
    {
        if (!$userId) {
            $userId = $this->Controller->Auth->user('id');
        }
        $model = TableRegistry::get('Notification.Notifications');
        $query = $model->find()->where(['Notifications.user_id' => $userId]);
        if (!is_null($state)) {
            $query->where(['Notifications.state' => $state]);
        }
        return $query->count();
    }
    /**
     * markAsRead
     *
     * Used to mark a notification as read.
     * If no notificationId is given, all notifications of the chosen user will be marked as read.
     *
     * @param int $notificationId Id of the notification.
     * @param int|null $user Id of the user. Else the id of the session will be taken.
     * @return void
     */
    public function markAsRead($notificationId = null, $user = null)
    {
        if (!$user) {
            $user = $this->Controller->Auth->user('id');
        }
        $model = TableRegistry::get('Notification.Notifications');
        if (!$notificationId) {
            $query = $model->find('all')->where([
                'user_id' => $user,
                'state' => 1
            ]);
        } else {
            $query = $model->find('all')->where([
                'user_id' => $user,
                'id' => $notificationId
            ]);
        }
        foreach ($query as $item) {
            $item->set('state', 0);
            $model->save($item);
        }
    }
    /**
     * notify
     *
     * Sends notifications to specific users.
     * The first parameter `$data` is an array with multiple options.
     *
     * ### Options
     * - `users` - An array or int with id's of users who will receive a notification.
     * - `roles` - An array or int with id's of roles which all users ill receive a notification.
     * - `template` - The template wich will be used.
     * - `message` - The variables used in the template.
     *
     * ### Example
     * ```
     *  NotificationManager::instance()->notify([
     *      'users' => 1,
     *      'template' => 'newOrder',
     *      'message' => [
     *          'receiver' => $receiver->name
     *          'total' => $order->total
     *      ],
     *  ]);
     * ```
     *
     * @param array $data Data with options.
     * @return string
     */
    public function notify($data)
    {
        return NotificationManager::instance()->notify($data);
    }

    public function addRecipientList($name, $userIds)
    {
        Configure::write('Notification.recipientLists.' . $name, $userIds);
    }

    public function getRecipientList($name)
    {
        return Configure::read('Notification.recipientLists.' . $name);
    }

    public function setTemplateList($arrTemp)
    {
        if(!empty($arrTemp)|| is_array($arrTemp))
        {
            $this->_templateList = array_merge($this->_templateList,$arrTemp);
        }
    }
    public function getTemplateDetail($key){
        if(isset($this->_templateList[$key]))
            return $this->_templateList[$key];
        return $this->_templateList['default'];
    }



}