<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect()->route('asset-sets.index');
        return Inertia::render('Dashboard/Index');
    }
}
