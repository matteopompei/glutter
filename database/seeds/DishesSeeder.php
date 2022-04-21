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
                        'image' => "/Glutter-foto-cibi/carbonara.png",
                        'ingredients' => 'Pasta di Grano duro, Uovo, Guanciale, Pecorino, Pepe',
                        'price' => 8,
                        'visible' => true
                    ],
                    [
                        'name' => 'Amatriciana',
                        'image' => "/Glutter-foto-cibi/amatriciana.png",
                        'ingredients' => 'Pasta di Grano duro, Pomodoro, Guanciale, Pecorino, Cipolla',
                        'price' => 9,
                        'visible' => true
                    ],
                    [
                        'name' => 'Cacio e Pepe',
                        'image' => "/Glutter-foto-cibi/cacio-e-pepe.jpg",
                        'ingredients' => 'Pasta di Grano duro, Pecorino, Pepe',
                        'price' => 7,
                        'visible' => true
                    ],
                    [
                        'name' => 'Gricia',
                        'image' => "/Glutter-foto-cibi/gricia.png",
                        'ingredients' => 'Pasta di Grano duro, Pecorino, Guaciale',
                        'price' => 7,
                        'visible' => true
                    ],
                    [
                        'name' => 'Fettuccine al Tartufo',
                        'image' => "/Glutter-foto-cibi/fettuccine-al-tartufo.png",
                        'ingredients' => 'Pasta di Grano duro, Tartufo, Burro,Olio',
                        'price' => 12,
                        'visible' => true
                    ],
                    [
                        'name' => 'Pappardelle al Cinghiale',
                        'image' => "/Glutter-foto-cibi/pappardelle-al-cinghiale.jpeg",
                        'ingredients' => "Pasta all'uovo, Cinghiale, Olio, Pomodoro",
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
                        'image' => "/Glutter-foto-cibi/pizza-margherita.jpeg",
                        'ingredients' => 'Pomodoro, Mozzarella, Farina 0, Basilico, Olio, Sale',
                        'price' => 5,
                        'visible' => true
                    ],
                    [
                        'name' => 'Boscaiola',
                        'image' => "/Glutter-foto-cibi/pizza-boscaiola.jpeg",
                        'ingredients' => 'Funghi, Salsiccia, Mozzarella, Farina 0, Olio, Sale',
                        'price' => 7,
                        'visible' => true
                    ],
                    [
                        'name' => 'Marinara',
                        'image' => "/Glutter-foto-cibi/pizza-marinara.jpeg",
                        'ingredients' => 'Pomodoro, Aglio, Origano, Farina 0, Sale, Olio',
                        'price' => 4,
                        'visible' => true
                    ],
                    [
                        'name' => 'Pizza Carbonara',
                        'image' => "/Glutter-foto-cibi/pizza-carbonara.jpeg",
                        'ingredients' => 'Pecorino, Farina 0, Guaciale, Uovo',
                        'price' => 8,
                        'visible' => true
                    ],
                    [
                        'name' => 'Valdostana',
                        'image' => "/Glutter-foto-cibi/pizza-valdostana.jpeg",
                        'ingredients' => 'Pomodoro, Fontina, Prosciutto cotto, Farina 0, Sale, Olio',
                        'price' => 9,
                        'visible' => true
                    ],
                    [
                        'name' => 'Diavola',
                        'image' => "/Glutter-foto-cibi/pizza-diavola.png",
                        'ingredients' => "Pomodoro, Mozzarella, Salame piccante, Farina 0, Olio",
                        'price' => 8,
                        'visible' => true
                    ],
                    [
                        'name' => 'Alici',
                        'image' => "/Glutter-foto-cibi/pizza-napoli.png",
                        'ingredients' => "Pomodoro, Alici, Farina 0, Olio, Origano",
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
                        'image' => "/Glutter-foto-cibi/sushi-nigiri.jpeg",
                        'ingredients' => 'Riso, Salmone',
                        'price' => 10,
                        'visible' => true
                    ],
                    [
                        'name' => 'Gunkan',
                        'image' => "/Glutter-foto-cibi/gunkan.jpeg",
                        'ingredients' => 'Riso, Salmone, Philadelphia, Uova di pesce',
                        'price' => 10,
                        'visible' => true
                    ],
                    [
                        'name' => 'Uramaki',
                        'image' => "/Glutter-foto-cibi/uramaki.jpeg",
                        'ingredients' => 'Riso, Alga Nori, Salmone, Avocado',
                        'price' => 4,
                        'visible' => true
                    ],
                    [
                        'name' => 'Chumaki',
                        'image' => "/Glutter-foto-cibi/chumaki.jpeg",
                        'ingredients' => 'Riso, Alga Nori, Avocado, Pesce, Verdure',
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
