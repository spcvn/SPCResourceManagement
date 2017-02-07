<?php
use Migrations\AbstractSeed;

/**
 * Positions seed.
 */
class PositionsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'ADMIN',
                'is_delete' => '0',
            ],
            [
                'id' => '2',
                'name' => 'IT',
                'is_delete' => '0',
            ],
            [
                'id' => '3',
                'name' => 'HR',
                'is_delete' => '0',
            ],
        ];

        $table = $this->table('positions');
        $table->insert($data)->save();
    }
}
