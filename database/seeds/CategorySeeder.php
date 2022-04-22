<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['pizza', 'carne', 'pesce', 'sushi', 'poke', 'hamburger', 'kebab', 'italiano', 'dolci', 'pasta'];
        foreach ($categories as $element) {
            $new_category = new Category();
            $new_category->name = $element;
            // creiamo seed dello slug (?) : $new_category->slug = Str::of($element)->slug('-');
            $new_category->save();
        }
    }
}
