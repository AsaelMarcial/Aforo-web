<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commerce;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    public function index()
    {
        $commerces = Commerce::where('status', 1)->latest('id')->paginate(11);
        return view('commerces.index', compact('commerces'));
    }

    public function show(Commerce $commerce)
    {
        $similares = Commerce::where('category_id', $commerce->category_id)
        ->where('status', 1)
        ->where('id', '!=', $commerce->id)
        ->latest('id')
        ->take(4)
        ->get();
        return view('commerces.show', compact('commerce', 'similares'));
    }

    public function category(Category $category)
    {
        $commerces = Commerce::where('category_id', $category->id)
        ->where('status', 1)
        ->latest('id')
        ->paginate(4);
        return view('commerces.category', compact('commerces', 'category'));
    }
}
