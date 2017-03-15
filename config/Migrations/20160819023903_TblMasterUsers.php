<?php
use Migrations\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class TblMasterUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */

    public function up(){
        $users = $this->table('tbl_master_users', [
            'id' => false,
            'primary_key' => ['id']
        ]);
        $users->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])

            ->addPrimaryKey(['id'])
            ->addColumn('dep_id', 'integer')
            ->addColumn('email', 'string')
            ->addColumn('username', 'string')
            ->addColumn('password', 'string', array('limit' => 255))
            ->addColumn('remember_token', 'string', array('limit' => 255,'null' => true,'default'=>null))
            ->addColumn('confirmation_code', 'string', array('limit' => 200,'null' => true,'default'=>null))
            ->addColumn('confirmed', 'integer', array('limit' => 50,'null' => true,'default'=>0))
            ->addColumn('provider', 'string', array('limit' => 100,'null' => true,'default'=>null))
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
            ->addColumn('status', 'integer', [
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
            ->addColumn('last_login', 'datetime', array('limit' => 50,'null' => true,'default'=>null))
            ->addColumn('last_login_ip', 'string', array('limit' => 100,'null' => true,'default'=>null))
            ->addColumn('last_login_now', 'datetime', array('limit' => 50,'null' => true,'default'=>null))
            ->addColumn('last_login_ip_now', 'string', array('limit' => 100,'null' => true,'default'=>null))
            ->addColumn('del_flg', 'integer' , ['limit'=>1,'default'=>0])
            ->addColumn('created', 'datetime',['default'=> "CURRENT_TIMESTAMP"])
            ->addColumn('modified', 'datetime', array('null' => true,'default'=>null))
            ->addIndex(array('email','username'), array('unique' => true))
            ->addIndex(
                [
                    'dep_id',
                ]
            )
            ->addIndex(
                [
                    'email',
                ]
            )
            ->save();




    }
    public function down()
    {
        $this->table('tbl_master_approval')->dropForeignKey(['user_id']);
        $this->table('tbl_master_profile')->dropForeignKey(['user_id']);
        $this->table('tbl_master_requests')->dropForeignKey(['user_id']);
        $this->table('tbl_master_users')->drop();
    }
}