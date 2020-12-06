<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetSet;
use Inertia\Inertia;

class IllustrationController extends Controller
{
   public function index()
   {
       return Inertia::render('Illustrations/Index', $this->props);
   }

   public function assetSet($assetSet)
   {
       return Inertia::render('Illustrations/AssetSet', $this->props);
   }

   public function show(AssetSet $assetSet, Asset $asset)
   {

   }
}
