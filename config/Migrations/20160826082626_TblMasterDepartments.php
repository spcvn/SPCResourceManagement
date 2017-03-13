<?php
use Migrations\AbstractMigration;

class TblMasterDepartments extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */


    public function up()
    {
        $departments = $this->table('tbl_master_departments', [
            'id' => false,
            'primary_key' => ['id']
        ]);
        $departments->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string')
            ->addColumn('tel', 'string',['null'=>true])
            ->addColumn('address', 'string',['null'=>true])
            ->addColumn('status', 'integer', array('limit' => 1,'default'=>0))
            ->addColumn('del_flg', 'integer', array('limit' => 1,'default'=>0))
            ->addColumn('created', 'datetime',['default'=> "CURRENT_TIMESTAMP"])
            ->addColumn('modified', 'datetime', array('null' => true,'default'=>null))
            ->addIndex(
                [
                    'name',
                ]
            )
            ->save();

        $users = $this->table('tbl_master_users');
        $users->addForeignKey( 'dep_id',
            'tbl_master_departments',
            'id',
            [
                'update' => 'CASCADE',
                'delete' => 'CASCADE'
            ])->save();
    }
    public function down()
    {
        $this->table('tbl_master_users')->dropForeignKey('dep_id');
        $this->table('tbl_master_approval')->dropForeignKey(['dep_id']);
        $this->table('tbl_master_rules')->dropForeignKey(['dep_id']);
        $this->table('tbl_master_requests')->dropForeignKey(['dep_id']);
        $this->table('tbl_master_departments')->drop();
    }
}
