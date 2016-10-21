<?php
use Migrations\AbstractMigration;

class CreateAnswer extends AbstractMigration
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
        $table = $this->table('answers', ['id' => false, 'primary_key' => ['answer_id', 'question_id']]);
        $table->addColumn('question_id', 'integer');
        $table->addColumn('answer_id', 'integer');
        $table->addColumn('answer', 'text');
        $table->addColumn('is_correct', 'integer');
        $table->create();
    }
}
