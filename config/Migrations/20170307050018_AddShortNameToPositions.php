<?php
use Migrations\AbstractMigration;

class AddShortNameToPositions extends AbstractMigration
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
        $table = $this->table('positions');
        $table->addColumn('short_name', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('position', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('short_position', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->update();
    }
}
