<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // Ritorna tutte le categorie
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        return response()->json($categories);
    }
}
