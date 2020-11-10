<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create(); 
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('apicrud')
        ]);       
        $user->createToken('MyApp')->accessToken; 
        for ($i = 0; $i < 3; $i++) {           
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('apicrud')
            ]);
            $user->createToken('MyApp')->accessToken; 
        }      
    }
}
