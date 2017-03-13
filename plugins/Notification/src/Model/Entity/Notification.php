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
namespace Notification\Model\Entity;
use Cake\Core\Configure;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Text;
/**
 * Notification Entity.
 */
class Notification extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'template' => true,
        'message' => true,
        'tracking_id' => true,
        'user_id' => true,
        'state' => false,
        'user' => false,
        'title' => true
    ];
    protected $_usersInfo = [];
    /**
     * _getmessage
     *
     * Getter for the message-column.
     *
     * @param string $message Data.
     * @return mixed
     */
    protected function _getMessage($message)
    {
        $array = json_decode($message, true);
        if (is_object($array)) {
            return $array;
        }
        return $message;
    }
    /**
     * _setmessage
     *
     * Setter for the message-column
     *
     * @param array $message Data.
     * @return string
     */
    protected function _setMessage($message)
    {
        if (is_array($message)) {
            return json_encode($message);
        }
        return $message;
    }
    /**
     * _getTitle
     *
     * Getter for the title.
     * Data is used from the message-column.
     * The template is used from the configurations.
     *
     * @return string
     */
    protected function _getTitle()
    {
        $templates = Configure::read('Notification.Templates');
        if (array_key_exists($this->_properties['template'], $templates)) {
            $message = json_decode($this->_properties['message'], true);
            $template = $templates[$this->_properties['template']][$message['type_id']];
            $detail = $this->getUserInfo($message['user_id']);
            return __($template,$detail->profile->first_name . ' ' .$detail->profile->last_name);
        }
        return '';
    }
    /**
     * _getBody
     *
     * Getter for the body.
     * Data is used from the message-column.
     * The template is used from the configurations.
     *
     * @return string
     */
    protected function _getBody()
    {
        $templates = Configure::read('Notification.Templates');
        if (array_key_exists($this->_properties['template'], $templates)) {
            $message = json_decode($this->_properties['message'], true);
            $template = $templates[$this->_properties['template']][$message['type_id']];
            $detail = $this->getUserInfo($message['user_id']);
            return __($template,$detail->profile->first_name . ' ' .$detail->profile->last_name);
        }
        return '';
    }
    protected function _getLink()
    {
        $message = json_decode($this->_properties['message'], true);
        if(isset($message['id']) && !empty($message['id'])){
            $link =  Router::url(array('controller'=>'Requests', 'action'=>'preview', $message['id']),true);
            return $link;
        }
        return '';
    }
    /**
     * _getUnread
     *
     * Boolean if the notification is read or not.
     *
     * @return bool
     */
    protected function _getUnread()
    {
        if ($this->_properties['state'] === 1) {
            return true;
        }
        return false;
    }
    /**
     * _getRead
     *
     * Boolean if the notification is read or not.
     *
     * @return bool
     */
    protected function _getRead()
    {
        if ($this->_properties['state'] === 0) {
            return true;
        }
        return false;
    }

    /**
     * _getFromUser
     *
     * Boolean if the notification is read or not.
     *
     * @return bool
     */
    protected function _getFromUser()
    {
        $message = json_decode($this->_properties['message'], true);
        if(isset($message['user_id']) && !empty($message['user_id'])){
            $detail = $this->getUserInfo($message['user_id']);
            if($detail){
                return $detail->profile->first_name . ' ' .$detail->profile->last_name;
            }
        }
        return '';
    }

    private function getUserInfo($user_id){
        if(!isset($this->_usersInfo[$user_id])){
            $users = TableRegistry::get('Users');
            $detail = $users->find()->where(['Users.id' => $user_id])
                ->contain(['Profiles'])->first();
            if( count($detail) && isset($detail->profile)){
                $this->_usersInfo[$user_id] =  $detail;
            }else{
                return false;
            }
        }
        return $this->_usersInfo[$user_id];
    }

    /**
     * Virtual fields
     *
     * @var array
     */
    protected $_virtual = ['title', 'body', 'unread', 'read', 'link','fromUser'];
}