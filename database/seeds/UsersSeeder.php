<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
            'business_name'=> "Da Lorenzo",
            'address'=>'Corso Tacito, 38, Terni, TR, 05100',
            'image'=>NULL, 
            'categories'=>[8],
            'password'=>bcrypt('mirtillomirtillo'),
            'email'=> 'da@lorenzo.it',
            'p_iva'=> 12345678911,
        ],
            [
                'business_name'=> "Da Matteo",
                'address'=>'Via Battisti, 2, Castorano, AP, 63081',
                'image'=>NULL, 
                'categories'=>[1],
                'password'=>bcrypt('samsamsam'),
                'email'=> 'da@matteo.it',
                'p_iva'=> 12345678912,
            ],
                [
                
                'business_name'=> "Sushi Love",
                'address'=>'Via della Stazione, 10, Roma, RO, 00100',
                'image'=>NULL, 
                'categories'=>[3],
                'password'=>bcrypt('mirtillosam'),
                'email'=> 'sushi@love.it',
                'p_iva'=> 12345678913,
            ],
        ];
        foreach($users as $user){
            $new_user = new User();
            $new_user->business_name = $user['business_name'];
            $new_user->address = $user['address'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->p_iva = $user['p_iva'];
            $new_user->image = $user['image'];
            $new_user->save();
            
            foreach($user['categories'] as $category){

                $new_user->categories()->attach($category);
            }
        }
    }
}


