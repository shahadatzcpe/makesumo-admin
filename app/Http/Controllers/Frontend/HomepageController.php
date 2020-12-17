<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Inertia\Inertia;

class HomepageController extends Controller
{
   public function homepage()
   {
        return Inertia::render('Homepage/Index');
   }
}
