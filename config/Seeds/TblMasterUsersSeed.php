<?php
use Cake\Core\Configure;
use Cake\Utility\Security;
use Migrations\AbstractSeed;

/**
 * TblMasterUsers seed.
 */
class TblMasterUsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {

        $pass = base64_encode(Security::encrypt('123456', Configure::read("Security.password")));
        $data = [
            [
                'id'    => 1,
                'dep_id'    => 1,
                'password'  => $pass,
                'email'  => 'admin@gmail.com',
                'username'  => 'admin',
                'confirmed'=>1,
                'del_flg'  => 0,
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
                'first_name' => 'Hung',
                'middle_name' => 'Minh ',
                'last_name' => 'Nguyen',
                'addr01' => '5/8A Song Hanh, quan 12',
                'provinceid' => '02',
                'districtid' => '027',
                'wardid' => '00781',
                'birth_date' => '1987-10-31',
                'mobile' => '0937954455',
                'dept' => '2',
                'avatar' => 'default.png',
                'status' => '0',
            ]
        ];

        $table = $this->table('tbl_master_users');
        $table->insert($data)->save();

        $data = [
            [
                'id'    => 1,
                'name'  => 'admin',
                'display_name'  => 'Admin',
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 2,
                'name'  => 'top',
                'display_name'  => 'Top',
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 3,
                'name'  => 'manager',
                'display_name'  => 'Manager',
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 4,
                'name'  => 'sub-manager',
                'display_name'  => 'Sub-Manger',
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 5,
                'name'  => 'staff',
                'display_name'  => 'Staff',
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ]
        ];
//
        $table = $this->table('tbl_master_roles');
        $table->insert($data)->save();

        $data = [
            [
                'id'    => 1,
                'user_id'    => 1,
                'role_id'  => 1,
            ]
        ];

        $table = $this->table('tbl_master_role_user');
        $table->insert($data)->save();
    }
}
