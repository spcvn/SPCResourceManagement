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
            ->addColumn('is_delete', 'integer', [
                'default' => '0',
                'limit' => 2,
                'null' => true,
            ])
            ->create();

        $this->table('districts', ['id' => false, 'primary_key' => ['districtid']])
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

        $this->table('exams_has_sections', ['id' => false, 'primary_key' => ['exams_id', 'sections_id']])
            ->addColumn('exams_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sections_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('ratio', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('examstemplates')
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
            ->addColumn('duration', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('groups', ['id' => false, 'primary_key' => ['idgroups']])
            ->addColumn('idgroups', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('namegroups', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => true,
            ])
            ->addColumn('datecreate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('modules', ['id' => false, 'primary_key' => ['idmodules']])
            ->addColumn('idmodules', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modulesname', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('permissions')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('datecreate', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => null,
                'limit' => 2,
                'null' => true,
            ])
            ->create();

        $this->table('positions')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => false,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => true,
            ])
            ->create();

        $this->table('provinces', ['id' => false, 'primary_key' => ['provinceid']])
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
            ->addColumn('section_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => '1',
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('create_date', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('update_date', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => null,
                'limit' => 2,
                'null' => true,
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
                'default' => '0',
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
                'limit' => 11,
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
                'default' => '0',
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('score', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('ipaddress', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => '0',
                'limit' => 2,
                'null' => true,
            ])
            ->addColumn('datecreate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('updatecreate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('resetpasswords')
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

        $this->table('roles', ['id' => false, 'primary_key' => ['idroles']])
            ->addColumn('idroles', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('nameroles', 'string', [
                'default' => null,
                'limit' => 110,
                'null' => true,
            ])
            ->addColumn('datecreate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('is_delete', 'integer', [
                'default' => null,
                'limit' => 2,
                'null' => true,
                'signed' => false,
            ])
            ->create();

        $this->table('roles_has_permissions', ['id' => false, 'primary_key' => ['roles_idroles', 'permissions_id']])
            ->addColumn('roles_idroles', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('permissions_id', 'integer', [
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
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('addr01', 'text', [
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
            ->addColumn('mobile', 'string', [
                'default' => null,
                'limit' => 20,
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
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => 11,
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
            ->addColumn('is_delete', 'integer', [
                'default' => '0',
                'limit' => 2,
                'null' => true,
            ])
            ->create();

        $this->table('users_has_groups', ['id' => false, 'primary_key' => ['users_id', 'groups_idgroups']])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('groups_idgroups', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('users_has_roles', ['id' => false, 'primary_key' => ['users_id', 'roles_idroles']])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('roles_idroles', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('wards', ['id' => false, 'primary_key' => ['wardid']])
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
        $this->dropTable('districts');
        $this->dropTable('exams_has_sections');
        $this->dropTable('examstemplates');
        $this->dropTable('groups');
        $this->dropTable('modules');
        $this->dropTable('permissions');
        $this->dropTable('positions');
        $this->dropTable('provinces');
        $this->dropTable('questions');
        $this->dropTable('quiz_details');
        $this->dropTable('quizs');
        $this->dropTable('resetpasswords');
        $this->dropTable('roles');
        $this->dropTable('roles_has_permissions');
        $this->dropTable('sections');
        $this->dropTable('users');
        $this->dropTable('users_has_groups');
        $this->dropTable('users_has_roles');
        $this->dropTable('wards');
    }
}
