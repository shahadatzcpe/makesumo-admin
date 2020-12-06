<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SearchController extends Controller
{
   public function result()
   {
       $this->props['search_results'] = [
            'has_items' => rand(0,1)
       ];


       return Inertia::render('Search/Index', $this->props);
   }
}
