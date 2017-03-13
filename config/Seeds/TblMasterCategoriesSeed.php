<?php
use Migrations\AbstractSeed;

/**
 * TblMasterCategories seed.
 */
class TblMasterCategoriesSeed extends AbstractSeed
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
        $data = [
            [
                'id'    => 1,
                'name'  => '書籍購入、', //Xin Hoc Phi
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 2,
                'name'  => 'セミナー参加',//Phi Tham Du Hoi Thao
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],

            [
                'id'    => 3,
                'name'  => 'その他',//Nhung Loai Khac
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 4,
                'name'  => '物品購入', // mua vat pham
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 5,
                'name'  => '◯アスクル',//Askul
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 6,
                'name'  => '◯アスクル以外',//Not Askul
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 7,
                'name'  => 'ツール導入',//Mua phan mem
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ],
            [
                'id'    => 8,
                'name'  => '社内制度提案改定',//Chi phi Thuc hien de xuat
                'created'  => '2016-08-27 13:23:29',
                'modified'  => '2016-08-27 13:23:29',
            ]
        ];

        $table = $this->table('tbl_master_categories');
        $table->insert($data)->save();
    }
}
