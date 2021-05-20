<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //
        $data = [
            'categories' => Category::all()
        ];
        return view('guest.categories.index', $data);
    }

    public function show($slug)
    {
        
    }
}
