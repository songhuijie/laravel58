<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $array = [

            ['name'=>'jiedage123','email'=>'26770608@qq.com','password'=>md5('123456')],
            ['name'=>'jiedage1234','email'=>'26770609@qq.com','password'=>md5('123456')],
        ];
        \App\Http\Models\Users::insert($array);
    }
}
