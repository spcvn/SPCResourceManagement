<?php
use Migrations\AbstractMigration;

class CreateQuizs extends AbstractMigration
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
        $table = $this->table('quizs');
        $table->addColumn('candidate_id', 'integer', [
				'length' => 6,
	        	'null' => false
	        	]);
        $table->addColumn('code', 'text', [
        		'length' => 255,
        		'null' => false
        		]);
        $table->addColumn('url', 'text', [
        		'length' => 255,
        		'null' => false
        		]);
        $table->addColumn('time', 'integer', [
        		'length' => 6,
        		'null' => false
        		]);
        $table->addColumn('quiz_date', 'datetime');
        $table->addColumn('total', 'integer', ['length' => 6]);
        $table->addColumn('correct', 'integer', ['length' => 6]);
        $table->addColumn('status', 'integer', ['length' => 6, 'default' => 0]);
        $table->create();
    }
}
