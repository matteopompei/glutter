<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'user_id' => 1,
                'dishes' => [
                    [
                        'name' => 'Carbonara',
                        'image' => NULL,
                        'ingredients' => 'Uovo, Guanciale, Pecorino, Pasta di Grano duro, Pepe',
                        'price' => 8,
                        'visible' => true
                    ],
                    [
                        'name' => 'Amatriciana',
                        'image' => NULL,
                        'ingredients' => 'Pomodoro, Guanciale, Pecorino, Pasta di Grano duro, Cipolla',
                        'price' => 9,
                        'visible' => true
                    ],
                    [
                        'name' => 'Cacio e Pepe',
                        'image' => NULL,
                        'ingredients' => 'Pecorino, Pasta di Grano duro, Pepe',
                        'price' => 7,
                        'visible' => true
                    ],
                    [
                        'name' => 'Gricia',
                        'image' => NULL,
                        'ingredients' => 'Pecorino, Pasta di Grano duro,Guaciale',
                        'price' => 7,
                        'visible' => true
                    ],
                    [
                        'name' => 'Fettuccine al Tartufo',
                        'image' => NULL,
                        'ingredients' => 'Tartufo, Pasta di Grano duro, Burro,Olio',
                        'price' => 12,
                        'visible' => true
                    ],
                    [
                        'name' => 'Fettuccine al Tartufo',
                        'image' => NULL,
                        'ingredients' => "Tartufo, Pasta all'uovo, Burro,Olio",
                        'price' => 14,
                        'visible' => true
                    ],
                    [
                        'name' => 'Pappardelle al Cinghiale',
                        'image' => NULL,
                        'ingredients' => "Cinghiale, Pasta all'uovo,Olio, Pomodoro",
                        'price' => 12,
                        'visible' => true
                    ],
                ]
            ],
            [
                'user_id' => 2,
                'dishes' => [
                    [
                        'name' => 'Margherita',
                        'image' => NULL,
                        'ingredients' => 'Pomodoro, Mozzarella, Farina 0, Basilico, Olio, Sale',
                        'price' => 5,
                        'visible' => true
                    ],
                    [
                        'name' => 'Boscaiola',
                        'image' => NULL,
                        'ingredients' => 'Funghi, Salsiccia, Mozzarella, Farina 0, Olio, Sale',
                        'price' => 7,
                        'visible' => true
                    ],
                    [
                        'name' => 'Marinara',
                        'image' => NULL,
                        'ingredients' => 'Pomodoro, Aglio,Origano, Farina 0, Sale, Olio',
                        'price' => 4,
                        'visible' => true
                    ],
                    [
                        'name' => 'Pizza Carbonara',
                        'image' => NULL,
                        'ingredients' => 'Pecorino, Farina 0,Guaciale, Uovo',
                        'price' => 8,
                        'visible' => true
                    ],
                    [
                        'name' => 'Valdostana',
                        'image' => NULL,
                        'ingredients' => 'Pomodoro, Fontina,Prosciutto cotto,Farina 0,Sale,Olio',
                        'price' => 9,
                        'visible' => true
                    ],
                    [
                        'name' => 'Diavola',
                        'image' => NULL,
                        'ingredients' => "Pomodoro, Mozzarella,Salame piccante,,Farina 0,Olio",
                        'price' => 8,
                        'visible' => true
                    ],
                    [
                        'name' => 'Alici',
                        'image' => NULL,
                        'ingredients' => "Pomodoro, Alici, Burrata,Farina 0,Olio, Origano",
                        'price' => 10,
                        'visible' => true
                    ],
                ]
            ],
            [
                'user_id' => 3,
                'dishes' => [
                    [
                        'name' => 'Nigiri al Salmone',
                        'image' => NULL,
                        'ingredients' => 'Riso, Salmone',
                        'price' => 10,
                        'visible' => true
                    ],
                    [
                        'name' => 'Gunkan',
                        'image' => NULL,
                        'ingredients' => 'Alga Nori, Riso, Pesce',
                        'price' => 10,
                        'visible' => true
                    ],
                    [
                        'name' => 'Uramaki',
                        'image' => NULL,
                        'ingredients' => 'Riso, Uova di pesce,Alga Nori, Semi di Sesamo',
                        'price' => 4,
                        'visible' => true
                    ],
                    [
                        'name' => 'Chumaki',
                        'image' => NULL,
                        'ingredients' => 'Riso, Alga Nori,Avocado, Pesce, Verdure',
                        'price' => 8,
                        'visible' => true
                    ],
                ]
            ],
        ];

        //Esegue il seed dei piatti
        foreach ($dishes as $element) {
            foreach ($element['dishes'] as $dish) {
                $new_dish = new Dish();
                $new_dish->name = $dish['name'];
                $new_dish->image = $dish['image'];
                $new_dish->ingredients = $dish['ingredients'];
                $new_dish->price = $dish['price'];
                $new_dish->visible = $dish['visible'];
                $new_dish->user_id = $element['user_id'];

                $new_dish->save();
            }
        }
    }
}
