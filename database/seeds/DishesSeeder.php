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
            [
                'user_id' => 4,
                'dishes' => [
                    [
                        'name' => 'Poke Mango e Salmone',
                        'image' => "/Glutter-foto-cibi/poke-1.jpeg",
                        'ingredients' => 'Riso, Salmone, Edamame, Mango, Zucca, Semi di sesamo',
                        'price' => 10,
                        'visible' => true
                    ],
                    [
                        'name' => 'Poke Avocado e Tonno',
                        'image' => "/Glutter-foto-cibi/poke-2.png",
                        'ingredients' => 'Riso, Salmone, Avocado, Mango, Tonno, Edamame, Semi di lino, Ravanello, Basilico',
                        'price' => 12,
                        'visible' => true
                    ],
                    [
                        'name' => 'Poke Mon',
                        'image' => "/Glutter-foto-cibi/poke-3.jpeg",
                        'ingredients' => 'Riso, Salmone, Avocado, Peperoni verdi, gialli e rossi, Semi di lino',
                        'price' => 11,
                        'visible' => true
                    ],
                    [
                        'name' => 'Poke Gamberi',
                        'image' => "/Glutter-foto-cibi/poke-4.jpeg",
                        'ingredients' => 'Riso, Avocado, Gamberi, Mais, Mandorle, Carote, Edamame, Radicchio',
                        'price' => 15,
                        'visible' => true
                    ],
                ]
            ],
            [
                'user_id' => 5,
                'dishes' => [
                    [
                        'name' => 'Panino Kebab',
                        'image' => "/Glutter-foto-cibi/panino-kebab.png",
                        'ingredients' => 'Panino, Kebab, Pomodoro, Mais, Scebola, Salsa piccante',
                        'price' => 4,
                        'visible' => true
                    ],
                    [
                        'name' => 'Piadina Kebab',
                        'image' => "/Glutter-foto-cibi/piadina-kebab.jpeg",
                        'ingredients' => 'Riso, Salmone, Edamame, Mango, Zucca, Semi di sesamo',
                        'price' => 6,
                        'visible' => true
                    ],

                ]
            ],
            [
                'user_id' => 6,
                'dishes' => [
                    [
                        'name' => 'Hamburger',
                        'image' => "/Glutter-foto-cibi/hamburger-2.png",
                        'ingredients' => 'Pane, Scottona, Cheddar, Lattuga, Pomodoro',
                        'price' => 4,
                        'visible' => true
                    ],
                    [
                        'name' => 'Chicken Burger',
                        'image' => "/Glutter-foto-cibi/hamburger.png",
                        'ingredients' => 'Pane, Burger di pollo, Iceberg, Pomodoro, Cheddar',
                        'price' => 6,
                        'visible' => true
                    ],

                ]
            ],
            [
                'user_id' => 7,
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
            [
                'user_id' => 8,
                'dishes' => [
                    [
                        'name' => 'Hamburger',
                        'image' => "/Glutter-foto-cibi/hamburger-2.png",
                        'ingredients' => 'Pane, Scottona, Cheddar, Lattuga, Pomodoro',
                        'price' => 4,
                        'visible' => true
                    ],
                    [
                        'name' => 'Chicken Burger',
                        'image' => "/Glutter-foto-cibi/hamburger.png",
                        'ingredients' => 'Pane, Burger di pollo, Iceberg, Pomodoro, Cheddar',
                        'price' => 6,
                        'visible' => true
                    ],
                ]
            ],
            [
                'user_id' => 9,
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
                'user_id' => 10,
                'dishes' => [
                    [
                        'name' => 'Filetto di Vitello',
                        'image' => "/Glutter-foto-cibi/filetto-vitello.jpeg",
                        'ingredients' => 'Filetto di Vitello al sangue, Sale, Rosmarino, Pepe',
                        'price' => 18,
                        'visible' => true
                    ],
                    [
                        'name' => 'Lonza di Maiale',
                        'image' => "/Glutter-foto-cibi/lonza-maiale.png",
                        'ingredients' => 'Lonza di Maiale al forno, Rosmarino, Pape, Sale',
                        'price' => 18,
                        'visible' => true
                    ],
                    [
                        'name' => 'Stinco di Maiale e Patate al forno',
                        'image' => "/Glutter-foto-cibi/stinco-maiale.jpeg",
                        'ingredients' => 'Stinco di Maiale al forno, Rosmarino, Pape, Sale, Patate cotte al forno',
                        'price' => 20,
                        'visible' => true
                    ],
                    [
                        'name' => 'Tagliata di Manzo e Patate fritte',
                        'image' => "/Glutter-foto-cibi/tagliata-patatine.png",
                        'ingredients' => 'Tagliata di manzo alla griglia, Rosmarino, Pape, Sale, Patate fritte',
                        'price' => 20,
                        'visible' => true
                    ],
                ]
            ],
            [
                'user_id' => 11,
                'dishes' => [
                    [
                        'name' => 'Torta Sacher',
                        'image' => "/Glutter-foto-cibi/sacher.jpeg",
                        'ingredients' => 'Cioccolato, Confettura albicocca, Cacao, Farina 00, Polvere di mandorle, Burro, Zucchero',
                        'price' => 30,
                        'visible' => true
                    ],
                    [
                        'name' => 'Torta Unicorno',
                        'image' => "/Glutter-foto-cibi/unicorno.jpeg",
                        'ingredients' => 'Arcobaleno, Burro, Zucchero, Amore',
                        'price' => 30,
                        'visible' => true
                    ],
                    [
                        'name' => 'Tiramisu di Berenzo',
                        'image' => "/Glutter-foto-cibi/tisamisu.jpeg",
                        'ingredients' => 'Savoiardi, Uova, Mascarpone, Caffè, Cacao, Panna, Zucchero',
                        'price' => 30,
                        'visible' => true
                    ],
                ]
            ],
            [
                'user_id' => 12,
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
