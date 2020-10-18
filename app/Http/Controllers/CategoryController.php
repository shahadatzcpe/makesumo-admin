<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
    }
}
