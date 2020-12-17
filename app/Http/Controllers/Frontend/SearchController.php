<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
   public function result(Request $request)
   {
       $tag = Tag::where('name', $request->search)->first();

       $this->props['search_results'] = [
            'has_items' => $tag ?? null,
//            'illustration_3d_assets' => $tag->,
//            'illustration_3d_assets_count' => $tag->,
//            'illustrations_assets' => $tag->,
//            'illustrations_assets_count' => $tag->,
//            'icons_assets' => $tag->,
//            'icons_assets_count' => $tag->,
       ];

       $this->props['search'] = $request->search;


       return Inertia::render('Search/Index', $this->props);
   }
}
