<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SitemapController extends Controller
{
    public function preview()
    {

        return view('sitemap');
    }
}
