<?php
use Migrations\AbstractMigration;

class CreateCandidates extends AbstractMigration
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
        $table = $this->table('candidates');
        $table->addColumn('first_name', 'text');
        $table->addColumn('last_name', 'text');
        $table->addColumn('birth_date', 'date');
        $table->addColumn('addr01', 'text');
        $table->addColumn('addr02', 'text');
        $table->addColumn('mobile', 'text');
        $table->addColumn('expected_salary', 'text');
        $table->addColumn('interview_date', 'datetime');
        $table->addColumn('start_work', 'date');
        $table->addColumn('position', 'text');
        $table->addColumn('score', 'integer');
        $table->addColumn('result', 'text');
        $table->create();
    }
}
