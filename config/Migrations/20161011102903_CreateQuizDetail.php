<?php
use Migrations\AbstractMigration;

class CreateQuizDetail extends AbstractMigration
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
        $table = $this->table('quiz_details', ['id' => false, 'primary_key' => ['quiz_id', 'question_id']]);
        $table->addColumn('quiz_id', 'integer');
        $table->addColumn('question_id', 'integer');
        $table->addColumn('answer', 'integer');
        $table->addColumn('is_correct', 'integer', ['default' => 0]);
        $table->create();
    }
}
