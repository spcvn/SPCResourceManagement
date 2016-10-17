<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('username', 'text');
        $table->addColumn('password', 'text');
        $table->addColumn('salt', 'text');
        $table->addColumn('email', 'text');
        $table->addColumn('first_name', 'text');
        $table->addColumn('last_name', 'text');
        $table->addColumn('addr01', 'text');
        $table->addColumn('addr02', 'text');
        $table->addColumn('birth_date', 'date');
        $table->addColumn('mobile', 'text');
        $table->addColumn('dept', 'text');
        $table->addColumn('avatar', 'text');
        $table->addColumn('created', 'datetime');
        $table->addColumn('updated', 'datetime');
        $table->addColumn('status', 'text');
        $table->addColumn('role', 'integer');
        $table->create();
    }
}
