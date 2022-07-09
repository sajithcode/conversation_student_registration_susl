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
                'name'=>'Examination Branch',
                'regNum'=>'none',
                'email'=>'eb@gmail.com',
                'is_permission'=>'1',
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
        ];



        foreach ($user as $key => $value) {
            User::create($value);
        }

//        foreach ($status as $key => $value) {
//            Status::create($value);
//        }
    }
}
