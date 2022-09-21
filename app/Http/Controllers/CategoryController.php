<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('categories', compact('parentCategories'));
    }
}
