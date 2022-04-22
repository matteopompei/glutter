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
        $users = [
            [
                'business_name' => "Da Lorenzo",
                'address' => 'Corso Tacito, 38, Terni, TR, 05100',
                'image' => "/Glutter-foto-cibi/da-lorenzo.jpeg",
                'categories' => [8, 10],
                'password' => bcrypt('mirtillomirtillo'),
                'email' => 'da@lorenzo.it',
                'p_iva' => 12345678911,
            ],
            [
                'business_name' => "Da Matteo",
                'address' => 'Via Battisti, 2, Castorano, AP, 63081',
                'image' => "/Glutter-foto-cibi/da-matteo.jpg",
                'categories' => [1],
                'password' => bcrypt('samsamsam'),
                'email' => 'da@matteo.it',
                'p_iva' => 12345678912,
            ],
            [
                'business_name' => "Sushi Love",
                'address' => 'Via della Stazione, 10, Roma, RO, 00100',
                'image' => "/Glutter-foto-cibi/sushilove.jpg",
                'categories' => [3],
                'password' => bcrypt('mirtillosam'),
                'email' => 'sushi@love.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Poke Boll",
                'address' => 'Via del percorso, 7, Azzurropoli, AZ, 00100',
                'image' => "/Glutter-foto-cibi/pokeboll-logo.jpeg",
                'categories' => [5],
                'password' => bcrypt('chicochico'),
                'email' => 'poke@ball.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Il kebab di Mounir",
                'address' => 'Piazza santo Subito, 11b, Palermo, PA, 90100',
                'image' => "/Glutter-foto-cibi/mounir.png",
                'categories' => [7, 6],
                'password' => bcrypt('mirtillosam'),
                'email' => 'muonir@kebab.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Unto Burger",
                'address' => 'Via della liberazione, 69, Roma, RO, 00100',
                'image' => "/Glutter-foto-cibi/unto.jpg",
                'categories' => [6, 2],
                'password' => bcrypt('mirtillosam'),
                'email' => 'unto@burger.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Arashi Sushi",
                'address' => 'Via della Stazione, 17, Roma, RO, 00100',
                'image' => "/Glutter-foto-cibi/arashi.jpg",
                'categories' => [3],
                'password' => bcrypt('mirtillosam'),
                'email' => 'arashi@sushi.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Burger Thing",
                'address' => 'Via del vicolo cieco, 36, Castorano, AP, 00100',
                'image' => "/Glutter-foto-cibi/hamburger.png",
                'categories' => [6],
                'password' => bcrypt('mirtillosam'),
                'email' => 'burger@thing.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Mastro Peppe",
                'address' => 'Via Giangiacomo Ciaccio Montalto, 58a, Palermo, PA, 90100',
                'image' => "/Glutter-foto-cibi/mastro-peppe.png",
                'categories' => [1, 8, 10],
                'password' => bcrypt('mirtillosam'),
                'email' => 'mastro@peppe.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "The Fatted Calf",
                'address' => 'Via della Mattanza, 15, Torino, TO, 11100',
                'image' => "/Glutter-foto-cibi/calf-logo.jpeg",
                'categories' => [2],
                'password' => bcrypt('mirtillosam'),
                'email' => 'king@calf.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Le delizie di Berenzo",
                'address' => 'Piazza Graziella de Cevoli, 8, Terni, TR, 05100',
                'image' => "/Glutter-foto-cibi/le-delizie.jpeg",
                'categories' => [9],
                'password' => bcrypt('mirtillosam'),
                'email' => 'ledelizie@diberenzo.it',
                'p_iva' => 12345678913,
            ],
            [
                'business_name' => "Il Pastaio",
                'address' => 'Vicolo Stretto, 148, Terni, TR, 05100',
                'image' => "/Glutter-foto-cibi/pastaio.png",
                'categories' => [10],
                'password' => bcrypt('mirtillosam'),
                'email' => 'il@pastaio.it',
                'p_iva' => 12345678913,
            ],
        ];

        //Esegue il seed degli utenti 
        foreach ($users as $user) {
            $new_user = new User();
            $new_user->business_name = $user['business_name'];
            $new_user->address = $user['address'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->p_iva = $user['p_iva'];
            $new_user->image = $user['image'];
            $new_user->save();

            //Sincronizza le categorie con gli utenti (relazione many to many fra le due tabelle)
            foreach ($user['categories'] as $category) {
                $new_user->categories()->attach($category);
            }
        }
    }
}
