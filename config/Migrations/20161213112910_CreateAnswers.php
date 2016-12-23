<?php
use Migrations\AbstractMigration;

class CreateAnswers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('answers');
        $table->addColumn('question_id', 'integer')->addPrimaryKey('question_id');
        $table->addColumn('answer', 'text');
        $table->addColumn('is_correct', 'integer');
        $table->addColumn('sort', 'integer');
        $table->create();
    }
}
