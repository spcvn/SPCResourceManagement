<?php
use Migrations\AbstractMigration;

class TblMasterNotifications extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up(){
        $table = $this->table('tbl_master_notifications',[
        'id' => false,
            'primary_key' => ['id']
        ]);
        $table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,])
            ->addColumn('user_id', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => true,
            ])->addColumn('tracking_id', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('template', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])

            ->addColumn('state', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->save();
    }

    public function down()
    {
        $this->dropTable('tbl_master_notifications');
    }
}
