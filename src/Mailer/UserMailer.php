<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';
    public function welcome($user)
    {
        $this
            ->to($user->email)
            ->subject(sprintf('Welcome %s', $user->name))
            ->template('welcome_mail') 
            ->layout('custom');
    }

    public function resetPassword($user)
    {
    	$this->viewVars(['user'=>$user]);
        $this
            ->to($user->email)
            ->subject('[SPC-VN RM] Forget Password')
            ->emailFormat('html')
            ->set(['token' => $user->token]);
    }
}