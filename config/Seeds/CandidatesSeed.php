<?php
use Migrations\AbstractSeed;

/**
 * Candidates seed.
 */
class CandidatesSeed extends AbstractSeed
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
                'id' => '5',
                'first_name' => 'Hiển',
                'middle_name' => 'Chất',
                'last_name' => 'Nguyễn',
                'email' => 'hien.nguyen@spc-vn.com',
                'birth_date' => '1988-06-22',
                'married' => '0',
                'addr01' => '146-148 Cộng Hòa',
                'mobile' => '0919123456',
                'expected_salary' => '500$ ~ 750$',
                'interview_date' => '2017-03-01 12:00:00',
                'position_id' => '1',
                'score' => NULL,
                'result' => '2',
                'created_date' => '0000-00-00',
                'update_date' => '0000-00-00',
                'is_delete' => '0',
                'provinceid' => '52',
                'districtid' => '549',
                'wardid' => '21922',
            ],
        ];

        $table = $this->table('candidates');
        $table->insert($data)->save();
    }
}
