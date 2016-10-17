<?php
use Migrations\AbstractMigration;

class CreateQuestions extends AbstractMigration
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
        $table = $this->table('questions');
        $table->addColumn('question_no', 'integer', [
			'length' => 6,
        	'null' => false
        	]);
        $table->addColumn('content', 'text', [
        	'length' => 400,
        	'null' => false
        	]);
        $table->addColumn('section', 'integer', [
        	'length' => 6,
        	'null' => false
        	]);
        $table->addColumn('rank', 'integer', ['length' => 6]);
        $table->addColumn('status', 'integer', [
        	'length' => 6,
        	'default' => 1
        	]);
        $table->create();
    }
}
