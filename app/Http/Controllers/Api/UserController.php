<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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
}
