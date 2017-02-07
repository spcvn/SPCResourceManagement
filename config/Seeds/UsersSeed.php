<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'username' => 'admin',
                'password' => '$2y$10$a32yWG43nBn4oC8I9fbeIuNzQoWM66dWdgb/Mik31aLdK9r6faRKe',
                'salt' => '',
                'email' => 'hung.nm@spc-vn.com',
                'first_name' => 'Hung',
                'middle_name' => 'Minh ',
                'last_name' => 'Nguyen',
                'addr01' => '5/8A Song Hanh, quan 12',
                'addr02' => 'TP HCM',
                'provinceid' => '02',
                'districtid' => '027',
                'wardid' => '00781',
                'birth_date' => '1987-10-31',
                'mobile' => '0937954455',
                'dept' => '2',
                'avatar' => 'default.png',
                'created' => '2016-10-27 08:04:20',
                'updated' => '2017-01-20 15:29:37',
                'status' => '0',
                'role' => '0',
                'candidate_id' => '0',
                'start_work' => '2016-01-01',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
