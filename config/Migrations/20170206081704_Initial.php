<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('answers')
            ->addColumn('question_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('answer', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_correct', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sort', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => null,
                'limit' => 1,
                'null' => false,
            ])
            ->create();

        $this->table('candidates')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => false,
            ])
            ->addColumn('middle_name', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => true,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => false,
            ])
            ->addColumn('birth_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('married', 'integer', [
                'comment' => '0:single, 1: married',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('addr01', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('mobile', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('expected_salary', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('interview_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('position', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('score', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('result', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('update_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('district', ['id' => false, 'primary_key' => ['districtid']])
            ->addColumn('districtid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('location', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('provinceid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addIndex(
                [
                    'provinceid',
                ]
            )
            ->create();

        $this->table('exams')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => false,
            ])
            ->addColumn('num_questions', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('section', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('create_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('update_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => null,
                'limit' => 4,
                'null' => false,
            ])
            ->addColumn('id_user', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('positions')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => false,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => true,
            ])
            ->create();

        $this->table('province', ['id' => false, 'primary_key' => ['provinceid']])
            ->addColumn('provinceid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->create();

        $this->table('questions')
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('section', 'integer', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => 1,
                'limit' => 6,
                'null' => false,
            ])
            ->create();

        $this->table('quiz_details', ['id' => false, 'primary_key' => ['quiz_id', 'question_id']])
            ->addColumn('quiz_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('question_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('answer_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('is_correct', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sort', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('quizs')
            ->addColumn('candidate_id', 'integer', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('id_template', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('code', 'text', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('url', 'text', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('time', 'integer', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('quiz_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => 0,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('score', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('total', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('ipaddress', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->create();

        $this->table('resetpasswords', ['id' => false, 'primary_key' => ['']])
            ->addColumn('id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('token', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('create', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('timeout', 'integer', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('userid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('sections')
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('position', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('username', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('salt', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('email', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('first_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('middle_name', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('last_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('addr01', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('addr02', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('provinceid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('districtid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('wardid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('birth_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('mobile', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('dept', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('avatar', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('updated', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('status', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('role', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('candidate_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('start_work', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('ward', ['id' => false, 'primary_key' => ['wardid']])
            ->addColumn('wardid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('location', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('districtid', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addIndex(
                [
                    'districtid',
                ]
            )
            ->create();
    }

    public function down()
    {
        $this->dropTable('answers');
        $this->dropTable('candidates');
        $this->dropTable('district');
        $this->dropTable('exams');
        $this->dropTable('positions');
        $this->dropTable('province');
        $this->dropTable('questions');
        $this->dropTable('quiz_details');
        $this->dropTable('quizs');
        $this->dropTable('resetpasswords');
        $this->dropTable('sections');
        $this->dropTable('users');
        $this->dropTable('ward');
    }
}
