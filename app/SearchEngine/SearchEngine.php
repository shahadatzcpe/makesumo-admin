<?php

namespace App\SearchEngine;

use App\Models\Tag;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class SearchEngine{

    public function getRelatedKeywords($limit = 4) {
        return Tag::inRandomOrder()->take($limit)->pluck('name');
    }

    public function get3DItems($limit, $offset) {

    }

    public function getIllustrations($limit, $offset) {

    }

    public function getIcons($limit, $offset) {

    }
}
