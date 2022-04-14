<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $newUser = new User();
            $newUser -> business_name = $faker->words();
            $newUser -> email = $faker->email();
            $newUser -> password = $faker->password(8, 10);
            $newUser -> address = $faker->words();
        }
    }
}
