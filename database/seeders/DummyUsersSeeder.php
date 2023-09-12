<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userdata = [
            [
                'name'=>'mas admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'mas pegawai',
                'email'=>'pegawai@gmail.com',
                'role'=>'pegawai',
                'password'=>bcrypt('123456')
            ],
        ];
        foreach($userdata as $key => $val){
            User::create($val);
        }
    }

}
