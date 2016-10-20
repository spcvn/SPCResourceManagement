<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidate Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\Time $birth_date
 * @property string $addr01
 * @property string $addr02
 * @property string $mobile
 * @property string $position
 * @property string $expected_salary
 * @property \Cake\I18n\Time $interview_date
 * @property \Cake\I18n\Time $start_work
 * @property string $score
 * @property string $result
 */
class Candidate extends Entity
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
}
