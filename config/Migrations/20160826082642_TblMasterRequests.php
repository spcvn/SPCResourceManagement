<?php
use Migrations\AbstractMigration;

class TblMasterRequests extends AbstractMigration
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
        $requests = $this->table('tbl_master_requests', [
            'id' => false,
            'primary_key' => ['id']
        ]);
        $requests->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'integer')
            ->addColumn('dep_id', 'integer')
            ->addColumn('cate_id', 'integer')
            ->addColumn('title', 'string')
            ->addColumn('price', 'float',['precision' => 20,  'scale' => 2,'null'=>true])
            ->addColumn('description', 'text',['null'=>true])
            ->addColumn('effectiveness', 'text',['null'=>true])
            ->addColumn('attach', 'text',['null'=>true])
            ->addColumn('reason', 'text',['null'=>true])
            ->addColumn('note', 'text',['null'=>true])
            ->addColumn('appr_date', 'datetime')
            ->addColumn('del_flg', 'integer', array('limit' => 1,'default'=>0))
            ->addColumn('status', 'enum', array('values' => ['waiting','approved','rejected','returned']))
            ->addColumn('payment_date', 'datetime',['default'=> "CURRENT_TIMESTAMP"])
            ->addColumn('created', 'datetime',['default'=> "CURRENT_TIMESTAMP"])
            ->addColumn('modified', 'datetime', array('null' => true,'default'=>null))
            ->addForeignKey(
                'user_id',
                'tbl_master_users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'dep_id',
                'tbl_master_departments',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addIndex(
                [
                    'dep_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->addIndex(
                [
                    'title',
                ]
            )

            ->save();
    }
    public function down()
    {

        $this->table('tbl_master_requests')->drop();
    }
}