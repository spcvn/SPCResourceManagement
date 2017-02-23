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
                'id' => '1',
                'first_name' => 'TRUNG',
                'middle_name' => '',
                'last_name' => 'Nguyễn',
                'birth_date' => '1988-01-23',
                'married' => '0',
                'addr01' => '974A TRUONG SA',
                'mobile' => '0987654321',
                'expected_salary' => '250$ ~ 350$',
                'interview_date' => '2002-10-20 12:00:00',
                'position_id' => '2',
                'score' => NULL,
                'result' => '2',
                'created_date' => '0000-00-00',
                'update_date' => '0000-00-00',
                'is_delete' => '0',
            ],
            [
                'id' => '2',
                'first_name' => 'Son',
                'middle_name' => '',
                'last_name' => 'Nguyễn',
                'birth_date' => '1989-02-03',
                'married' => '0',
                'addr01' => 'Hoàng Hoa Thám',
                'mobile' => '0987654321',
                'expected_salary' => '350$ ~ 500$',
                'interview_date' => '2017-02-10 12:00:00',
                'position_id' => '2',
                'score' => NULL,
                'result' => '2',
                'created_date' => '0000-00-00',
                'update_date' => '0000-00-00',
                'is_delete' => '0',
            ],
            [
                'id' => '3',
                'first_name' => 'TRUNG',
                'middle_name' => '',
                'last_name' => 'TA HOANG ',
                'birth_date' => '1988-05-03',
                'married' => '0',
                'addr01' => '110 Nguyễn Huệ',
                'mobile' => '0987654321',
                'expected_salary' => '550$ ~ 750$',
                'interview_date' => '2017-03-02 12:00:00',
                'position_id' => '3',
                'score' => NULL,
                'result' => '',
                'created_date' => '0000-00-00',
                'update_date' => '0000-00-00',
                'is_delete' => '0',
            ],
            [
                'id' => '4',
                'first_name' => 'Hung',
                'middle_name' => 'Minh',
                'last_name' => 'Nguyen',
                'birth_date' => '1988-01-23',
                'married' => '1',
                'addr01' => '110 Nguyễn Huệ',
                'mobile' => '0987654321',
                'expected_salary' => '550$ ~ 750$',
                'interview_date' => '2017-05-31 12:00:00',
                'position_id' => '2',
                'score' => NULL,
                'result' => '',
                'created_date' => '0000-00-00',
                'update_date' => '0000-00-00',
                'is_delete' => '0',
            ],
        ];

        $table = $this->table('candidates');
        $table->insert($data)->save();
    }
}
