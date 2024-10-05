<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Kategori Artikel',
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('artikel', [
            'title' => $category->name,
            'artikel' => $category->artikel,
            'category' => $category->name
        ]);
    }
}
