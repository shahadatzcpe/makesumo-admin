<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetSet;
use Inertia\Inertia;

class Illustration3dController extends Controller
{
    public function index()
    {
        return Inertia::render('Illustrations3d/Index', $this->props);
    }

    public function assetSet(AssetSet $assetSet)
    {

    }

    public function show(AssetSet $assetSet, Asset $asset)
    {

    }
}
