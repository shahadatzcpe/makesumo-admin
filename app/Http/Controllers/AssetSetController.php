<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class AssetSetController extends Controller
{
    public function index()
    {
        return 1;
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
    }
}
