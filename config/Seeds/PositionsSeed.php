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
                'short_name' => 'admin',
                'position' => '',
                'short_position' => '',
            ],
            [
                'id' => '2',
                'name' => 'IT',
                'is_delete' => '0',
                'short_name' => 'it',
                'position' => 'Senior',
                'short_position' => 'it_senior',
            ],
            [
                'id' => '3',
                'name' => 'HR',
                'is_delete' => '0',
                'short_name' => 'hr',
                'position' => 'Accounter',
                'short_position' => 'hr_accounter',
            ],
            [
                'id' => '4',
                'name' => 'IT',
                'is_delete' => '0',
                'short_name' => 'it',
                'position' => 'Tester',
                'short_position' => 'it_tester',
            ],
        ];

        $table = $this->table('positions');
        $table->insert($data)->save();
    }
}
