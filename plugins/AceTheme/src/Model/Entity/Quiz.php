<?php
namespace AceTheme\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quiz Entity
 *
 * @property int $id
 * @property int $candidate_id
 * @property string $code
 * @property string $url
 * @property int $time
 * @property \Cake\I18n\Time $quiz_date
 * @property int $status
 * @property int $score
 * @property int $total
 *
 * @property \App\Model\Entity\Candidate $candidate
 * @property \App\Model\Entity\QuizDetail[] $quiz_details
 */
class Quiz extends Entity
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
