<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Get all categories by using Adjacency List package
        $categories = Category::tree()->get()->toTree();

        return view('welcome', [
            'categories' => $categories
        ]);
    }
}
