<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'user_id' => 1,
                'orders' => [
                    [
                        'name' => 'Simone',
                        'email' => 'sim@one.it',
                        'phone' => '331 3132321',
                        'address' => 'Via Moldavia, 30,Terni, TR, 05100',
                        'shipment' => 2,
                        'total' => 24,
                        'payed' => 26,
                        'dishes' => [
                            [
                                'dish_id' => 5,
                                'quantity' => 2,
                                'unit_price' => 12
                            ]
                        ]
                    ],
                    [
                        'name' => 'Matteo',
                        'email' => 'mat@teo.it',
                        'phone' => '331 3132322',
                        'address' => 'Via Matteotti, 10, Avigliano, TR, 05100',
                        'shipment' => 2,
                        'total' => 23,
                        'payed' => 25,
                        'dishes' => [
                            [
                                'dish_id' => 2,
                                'quantity' => 1,
                                'unit_price' => 9
                            ],
                            [
                                'dish_id' => 3,
                                'quantity' => 1,
                                'unit_price' => 7
                            ],
                            [
                                'dish_id' => 4,
                                'quantity' => 1,
                                'unit_price' => 7
                            ],
                        ]
                    ],
                    [
                        'name' => 'Lorenzo',
                        'email' => 'lore@lore.it',
                        'phone' => '331 3132323',
                        'address' => 'Via Pasini, 4, Cesi, TR, 05100',
                        'shipment' => 2,
                        'total' => 17,
                        'payed' => 19,
                        'dishes' => [
                            [
                                'dish_id' => 6,
                                'quantity' => 1,
                                'unit_price' => 12
                            ],
                            [
                                'dish_id' => 7,
                                'quantity' => 1,
                                'unit_price' => 5
                            ]
                        ]
                    ],
                    [
                        'name' => 'Giulio',
                        'email' => 'giulio@giulio.it',
                        'phone' => '331 3132324',
                        'address' => 'Piazza Cane, 22, Terni, TR, 05100',
                        'shipment' => 5,
                        'total' => 16,
                        'payed' => 18,
                        'dishes' => [
                            [
                                'dish_id' => 1,
                                'quantity' => 2,
                                'unit_price' => 8
                            ]
                        ]
                    ],
                ]
            ],
            [
                'user_id' => 2,
                'orders' => [
                    [
                        'name' => 'Mario',
                        'email' => 'mario@mario.it',
                        'phone' => '331 3132325',
                        'address' => 'Via Vesuvio, 3, Ascoli, AP, 63100',
                        'shipment' => 2,
                        'total' => 12,
                        'payed' => 14,
                        'dishes' => [
                            [
                                'dish_id' => 7,
                                'quantity' => 1,
                                'unit_price' => 5
                            ],
                            [
                                'dish_id' => 8,
                                'quantity' => 1,
                                'unit_price' => 7
                            ]
                        ]
                    ],
                    [
                        'name' => 'Alessandra',
                        'email' => 'alessandra@alessandra.it',
                        'phone' => '331 3132326',
                        'address' => 'Via Torrente, 11, Castorano,  AP, 63081',
                        'shipment' => 2,
                        'total' => 15,
                        'payed' => 17,
                        'dishes' => [
                            [
                                'dish_id' => 7,
                                'quantity' => 3,
                                'unit_price' => 5
                            ],
                        ]
                    ],
                    [
                        'name' => 'Giovanni',
                        'email' => 'giova@giova.it',
                        'phone' => '331 3132327',
                        'address' => 'Piazza Fava, 5,Castel di Lama, AP, 63080',
                        'shipment' => 2,
                        'total' => 25,
                        'payed' => 27,
                        'dishes' => [
                            [
                                'dish_id' => 10,
                                'quantity' => 1,
                                'unit_price' => 8
                            ],
                            [
                                'dish_id' => 11,
                                'quantity' => 1,
                                'unit_price' => 9
                            ],
                            [
                                'dish_id' => 12,
                                'quantity' => 1,
                                'unit_price' => 8
                            ],
                        ]
                    ],
                    [
                        'name' => 'Alberto',
                        'email' => 'alberto@alberto',
                        'phone' => '331 3132328',
                        'address' => 'Via Moldavia, 30, Castorano, AP, 63081',
                        'shipment' => 2,
                        'total' => 8,
                        'payed' => 10,
                        'dishes' => [
                            [
                                'dish_id' => 12,
                                'quantity' => 1,
                                'unit_price' => 8
                            ],
                        ]
                    ],
                ]
            ],
            [
                'user_id' => 3,
                'orders' => [
                    [
                        'name' => 'Peppino',
                        'email' => 'peppe@peppe.it',
                        'phone' => '331 3132329',
                        'address' => 'Piazza Franco, 3, Palermo, PA, 90121',
                        'shipment' => 2,
                        'total' => 30,
                        'payed' => 32,
                        'dishes' => [
                            [
                                'dish_id' => 13,
                                'quantity' => 3,
                                'unit_price' => 10
                            ],
                        ]
                    ],
                    [
                        'name' => 'Mirtillo',
                        'email' => 'mirtillo@mirtillino.it',
                        'phone' => '331 3132330',
                        'address' => 'Via Angusta, 3, Palermo, PA, 90121',
                        'shipment' => 3,
                        'total' => 20,
                        'payed' => 23,
                        'dishes' => [
                            [
                                'dish_id' => 14,
                                'quantity' => 1,
                                'unit_price' => 10
                            ],
                            [
                                'dish_id' => 15,
                                'quantity' => 1,
                                'unit_price' => 10
                            ],
                        ]
                    ],
                    [
                        'name' => 'Paolino',
                        'email' => 'paolino@paolino.it',
                        'phone' => '331 3132331',
                        'address' => 'Parco della Vittoria, 30,Palermo, PA, 90121',
                        'shipment' => 2,
                        'total' => 22,
                        'payed' => 24,
                        'dishes' => [
                            [
                                'dish_id' => 16,
                                'quantity' => 1,
                                'unit_price' => 4
                            ],
                            [
                                'dish_id' => 17,
                                'quantity' => 1,
                                'unit_price' => 8
                            ],
                            [
                                'dish_id' => 18,
                                'quantity' => 1,
                                'unit_price' => 10
                            ],
                        ]
                    ],
                ]
            ],
        ];
        //Esegue il seed degl'ordini
        foreach ($orders as $element) {
            foreach ($element['orders'] as $order) {
                $new_order = new Order();
                $new_order->name = $order['name'];
                $new_order->email = $order['email'];
                $new_order->phone = $order['phone'];
                $new_order->address = $order['address'];
                $new_order->shipment = $order['shipment'];
                $new_order->total = $order['total'];
                $new_order->payed = $order['payed'];
                $new_order->user_id = $element['user_id'];
                $new_order->save();

                foreach ($order['dishes'] as $dish) {
                    $new_order->dishes()->attach($dish, ['quantity' => $dish['quantity'], "unit_price" => $dish['unit_price'], 'dish_id' => $dish['dish_id']]);
                }
            }
        }
    }
}
