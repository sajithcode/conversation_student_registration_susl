<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Status;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'name'=>'Admin',
                'regNum'=>'none',
                'email'=>'admin@gmail.com',
                'is_permission'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Applied Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'appeb@gmail.com',
                'is_permission'=>'11',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Geo Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'geoeb@gmail.com',
                'is_permission'=>'12',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Social Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'socialeb@gmail.com',
                'is_permission'=>'13',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Management Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'manaeb@gmail.com',
                'is_permission'=>'14',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Medicine Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'medeb@gmail.com',
                'is_permission'=>'15',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Agri Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'agrieb@gmail.com',
                'is_permission'=>'16',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Tech Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'techeb@gmail.com',
                'is_permission'=>'17',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'GS Examination Branch Subject Clark',
                'regNum'=>'none',
                'email'=>'gseb@gmail.com',
                'is_permission'=>'18',
                'password'=> bcrypt('123456'),
            ],

            [
                'name'=>'Main Store Clark',
                'regNum'=>'none',
                'email'=>'ms@gmail.com',
                'is_permission'=>'2',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Vice Chancellor',
                'regNum'=>'none',
                'email'=>'vc@gmail.com',
                'is_permission'=>'3',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Student',
                'regNum'=>'none',
                'email'=>'std@gmail.com',
                'is_permission'=>'0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Ishan',
                'regNum'=>'none',
                'email'=>'jishanrandika@gmail.com',
                'is_permission'=>'0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Ishan Randika',
                'regNum'=>'18APC3563',
                'email'=>'jirandika@std.appsc.sab.ac.lk',
                'is_permission'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];



        foreach ($user as $key => $value) {
            User::create($value);
        }

//        foreach ($status as $key => $value) {
//            Status::create($value);
//        }
    }
}
