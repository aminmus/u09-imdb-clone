<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luke',
            'password' => '1234',
            'email' => 'skywalker@skywalker.com',
        ]);

        
       
    }
}
