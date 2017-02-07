<?php
use Migrations\AbstractSeed;

/**
 * Sections seed.
 */
class SectionsSeed extends AbstractSeed
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
                'name' => 'HTML',
                'position' => 'it',
            ],
            [
                'id' => '2',
                'name' => 'CSS',
                'position' => 'it',
            ],
            [
                'id' => '3',
                'name' => 'PHP',
                'position' => 'it',
            ],
            [
                'id' => '5',
                'name' => 'test',
                'position' => 'admin',
            ],
            [
                'id' => '6',
                'name' => 'JavaScript',
                'position' => 'it',
            ],
            [
                'id' => '7',
                'name' => 'Mysql',
                'position' => 'it',
            ],
            [
                'id' => '8',
                'name' => 'XML',
                'position' => 'it',
            ],
        ];

        $table = $this->table('sections');
        $table->insert($data)->save();
    }
}
