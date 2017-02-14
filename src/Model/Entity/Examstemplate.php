<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Examstemplate Entity
 *
 * @property int $id
 * @property string $name
 * @property int $num_questions
 * @property \Cake\I18n\Time $create_date
 * @property \Cake\I18n\Time $update_date
 * @property int $is_delete
 * @property int $id_user
 * @property int $duration
 *
 * @property \App\Model\Entity\Section[] $sections
 */
class Examstemplate extends Entity
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
