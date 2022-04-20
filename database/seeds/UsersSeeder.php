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
            'id'=> 0,
            'business_name'=> "Da Lorenzo",
            'address'=>'Corso Tacito, 38, Terni, TR, 05100',
            'iamge'=>NULL, 
            'categories'=>[8],
            'password'=>bcrypt('mirtillomirtillo'),
            'email'=> 'da@lorenzo.it',
            'p_iva'=> 12345678911,
            'dishes'=>[
                
                ['id'=>0,
                'name'=>'Carbonara',
                'image'=>NULL,
                'ingredients'=>'Uovo, Guanciale, Pecorino, Pasta di Grano duro, Pepe',
                'price'=> 8,
                'visible'=>true],
                
                ['id'=>1,
                'name'=>'Amatriciana',
                'image'=>NULL,
                'ingredients'=>'Pomodoro, Guanciale, Pecorino, Pasta di Grano duro, Cipolla',
                'price'=> 9,
                'visible'=>true],

                ['id'=>2,
                'name'=>'Cacio e Pepe',
                'image'=>NULL,
                'ingredients'=>'Pecorino, Pasta di Grano duro, Pepe',
                'price'=> 7,
                'visible'=>true],

                ['id'=>3,
                'name'=>'Gricia',
                'image'=>NULL,
                'ingredients'=>'Pecorino, Pasta di Grano duro,Guaciale',
                'price'=> 7,
                'visible'=>true],

                ['id'=>4,
                'name'=>'Fettuccine al Tartufo',
                'image'=>NULL,
                'ingredients'=>'Tartufo, Pasta di Grano duro, Burro,Olio',
                'price'=> 12,
                'visible'=>true],

                ['id'=>5,
                'name'=>'Fettuccine al Tartufo',
                'image'=>NULL,
                'ingredients'=>"Tartufo, Pasta all'uovo, Burro,Olio",
                'price'=> 14,
                'visible'=>true],

                ['id'=>6,
                'name'=>'Pappardelle al Cinghiale',
                'image'=>NULL,
                'ingredients'=>"Cinghiale, Pasta all'uovo,Olio, Pomodoro",
                'price'=> 12,
                'visible'=>true],
            ]
            ],
            [
                'id'=> 1,
                'business_name'=> "Da Matteo",
                'address'=>'Via Battisti, 2, Castorano, AP, 63081',
                'iamge'=>NULL, 
                'categories'=>[1],
                'password'=>bcrypt('samsamsam'),
                'email'=> 'da@matteo.it',
                'p_iva'=> 12345678912,
                'dishes'=>[
                    
                    ['id'=>7,
                    'name'=>'Margherita',
                    'image'=>NULL,
                    'ingredients'=>'Pomodoro, Mozzarella, Farina 0, Basilico, Olio, Sale',
                    'price'=> 5,
                    'visible'=>true],
                    
                    ['id'=>8,
                    'name'=>'Boscaiola',
                    'image'=>NULL,
                    'ingredients'=>'Funghi, Salsiccia, Mozzarella, Farina 0, Olio, Sale',
                    'price'=> 7,
                    'visible'=>true],
    
                    ['id'=>9,
                    'name'=>'Marinara',
                    'image'=>NULL,
                    'ingredients'=>'Pomodoro, Aglio,Origano, Farina 0, Sale, Olio',
                    'price'=> 4,
                    'visible'=>true],
    
                    ['id'=>10,
                    'name'=>'Pizza Carbonara',
                    'image'=>NULL,
                    'ingredients'=>'Pecorino, Farina 0,Guaciale, Uovo',
                    'price'=> 8,
                    'visible'=>true],
    
                    ['id'=>11,
                    'name'=>'Valdostana',
                    'image'=>NULL,
                    'ingredients'=>'Pomodoro, Fontina,Prosciutto cotto,Farina 0,Sale,Olio',
                    'price'=> 9,
                    'visible'=>true],
    
                    ['id'=>12,
                    'name'=>'Diavola',
                    'image'=>NULL,
                    'ingredients'=>"Pomodoro, Mozzarella,Salame piccante,,Farina 0,Olio",
                    'price'=> 8,
                    'visible'=>true],
    
                    ['id'=>13,
                    'name'=>'Alici',
                    'image'=>NULL,
                    'ingredients'=>"Pomodoro, Alici, Burrata,Farina 0,Olio, Origano",
                    'price'=> 10,
                    'visible'=>true],
                ]
                ],
            [
                'id'=> 2,
                'business_name'=> "Sushi Love",
                'address'=>'Via della Stazione, 10, Roma, RO, 00100',
                'iamge'=>NULL, 
                'categories'=>[3],
                'password'=>bcrypt('mirtillosam'),
                'email'=> 'sushi@love.it',
                'p_iva'=> 12345678913,
                'dishes'=>[
                    
                    ['id'=>14,
                    'name'=>'Nigiri al Salmone',
                    'image'=>NULL,
                    'ingredients'=>'Riso, Salmone',
                    'price'=> 10,
                    'visible'=>true],
                    
                    ['id'=>15,
                    'name'=>'Gunkan',
                    'image'=>NULL,
                    'ingredients'=>'Alga Nori, Riso, Pesce',
                    'price'=> 10,
                    'visible'=>true],
    
                    ['id'=>16,
                    'name'=>'Uramaki',
                    'image'=>NULL,
                    'ingredients'=>'Riso, Uova di pesce,Alga Nori, Semi di Sesamo',
                    'price'=> 4,
                    'visible'=>true],
    
                    ['id'=>17,
                    'name'=>'Chumaki',
                    'image'=>NULL,
                    'ingredients'=>'Riso, Alga Nori,Avocado, Pesce, Verdure',
                    'price'=> 8,
                    'visible'=>true],
                ]
            ],
        ];
        foreach($users as $user){
            $new_user = new User();
            $new_user->id = $user['id'];
            $new_user->business_name = $user['business_name'];
            $new_user->address = $user['address'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->p_iva = $user['p_iva'];
            $new_user->image = $user['iamge'];
            $new_user->categories = $user[''];

        }
    }
}
