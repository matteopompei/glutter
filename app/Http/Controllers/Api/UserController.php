<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    // Ritorna tutti i ristoranti con id, business_name, image e categorie
    public function index()
    {
        $users = User::with('categories')->get();

        $tempUsers = [];
        foreach ($users as $user) {
            $tempUser = [
                'id' => $user['id'],
                'business_name' => $user['business_name'],
                'address' => $user['address'],
                'image' => $user['image'],
                'categories' => []
            ];

            foreach ($user['categories'] as $category) {
                $tempCategory = [
                    'id' => $category['id'],
                    'name' => $category['name']
                ];

                $tempUser['categories'][] = $tempCategory;
            }

            $tempUsers[] = $tempUser;
        }

        return response()->json($tempUsers);
    }

    // Dato un ID ritorna il ristorante con quell'id e le relative informazioni
    public function show($id)
    {
        $user = User::where("id", $id)->with("categories", "dishes")->first();

        if (empty($user)) {
            return response()->json(["message" => "User Not Found"], 404);
        }

        $tempUser = [
            'id' => $user['id'],
            'business_name' => $user['business_name'],
            'address' => $user['address'],
            'image' => $user['image'],
            'categories' => [],
            'dishes' => []
        ];

        foreach ($user['categories'] as $category) {
            $tempCategory = [
                'id' => $category['id'],
                'name' => $category['name']
            ];

            $tempUser['categories'][] = $tempCategory;
        }

        foreach ($user['dishes'] as $dish) {
            if ($dish['visible'] == 1) {
                $tempDish = [
                    'id' => $dish['id'],
                    'name' => $dish['name'],
                    'image' => $dish['image'],
                    'ingredients' => $dish['ingredients'],
                    'price' => $dish['price']
                ];

                $tempUser['dishes'][] = $tempDish;
            }
        }

        return response()->json($tempUser);
    }

    // public function filter($category)
    // {

    //     $users = User::whereHas(
    //         'categories',
    //         function ($q) use ($category) {
    //             $q->where('name', $category);
    //         }
    //     )->get();

    //     $tempUsers = [];
    //     foreach ($users as $user) {
    //         $tempUser = [
    //             'id' => $user['id'],
    //             'business_name' => $user['business_name'],
    //             'address' => $user['address'],
    //             'image' => $user['image'],
    //             'categories' => []
    //         ];

    //         foreach ($user['categories'] as $category) {
    //             $tempCategory = [
    //                 'id' => $category['id'],
    //                 'name' => $category['name']
    //             ];

    //             $tempUser['categories'][] = $tempCategory;
    //         }

    //         $tempUsers[] = $tempUser;
    //     }

    //     return response()->json($tempUsers);
    // }
}
