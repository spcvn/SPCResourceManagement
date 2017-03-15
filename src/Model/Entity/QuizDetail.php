<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuizDetail Entity
 *
 * @property int $quiz_id
 * @property int $question_id
 * @property int $answer_id
 * @property int $is_correct
 * @property int $sort
 *
 * @property \App\Model\Entity\Quiz $quiz
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Answer $answer
 */
class QuizDetail extends Entity
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
        'quiz_id' => false,
        'question_id' => false
    ];
}
