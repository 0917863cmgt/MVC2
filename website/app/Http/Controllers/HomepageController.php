<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){

        return view('homepage.index', [
            'recipes' => Recipe::all(),
            'parentCategories' => Category::where('is_parent', true),
            'cuisine' => Category::where('parent_id', 3),
            'course' => Category::where('parent_id', 4),
            'protein' => Category::where('parent_id', 1),
            'vegetables' => Category::where('parent_id', 2),
        ]);
    }
}
