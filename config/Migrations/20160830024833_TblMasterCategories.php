<?php
use Migrations\AbstractMigration;

class TblMasterCategories extends AbstractMigration
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
        $departments = $this->table('tbl_master_categories', [
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
            ->addColumn('del_flg', 'integer', array('limit' => 1,'default'=>0))
            ->addColumn('created', 'datetime',['default'=> "CURRENT_TIMESTAMP"])
            ->addColumn('modified', 'datetime', array('null' => true,'default'=>null))
            ->addIndex(
                [
                    'name',
                ]
            )
            ->save();
        $req = $this->table('tbl_master_requests');
        $req->addForeignKey(
        'cate_id',
        'tbl_master_categories',
        'id',
        [
            'update' => 'CASCADE',
            'delete' => 'CASCADE'
        ]
        )->save();
    }
    public function down()
    {
        $this->table('tbl_master_requests')->dropForeignKey(['cate_id']);
        $this->table('tbl_master_categories')->drop();
    }

}
