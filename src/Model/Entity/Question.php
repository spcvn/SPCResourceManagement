<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $content
 * @property int $section_id
 * @property int $status
 * @property \Cake\I18n\Time $create_date
 * @property \Cake\I18n\Time $update_date
 * @property int $is_delete
 *
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\QuizDetail[] $quiz_details
 */
class Question extends Entity
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
