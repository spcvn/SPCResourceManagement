<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $addr01
 * @property string $provinceid
 * @property string $districtid
 * @property string $wardid
 * @property \Cake\I18n\Time $birth_date
 * @property string $mobile
 * @property int $dept
 * @property string $avatar
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property int $status
 * @property int $role
 * @property int $candidate_id
 * @property \Cake\I18n\Time $start_work
 * @property int $is_delete
 *
 * @property \App\Model\Entity\Candidate $candidate
 * @property \App\Model\Entity\Position $position
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

}
