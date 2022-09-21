<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * index function show categories list in list view
     */
    public function index(){
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('categories', compact('parentCategories'));
    }

    /**
     * tableView function show categories list in table view
     */
    public function tableView(){
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('categories-table', compact('parentCategories'));
    }
}
