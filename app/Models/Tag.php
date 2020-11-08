<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($tag) {
            $i = 0;
            do {
                $uniqSlug = $tag->name . ( $i ? "-" . $i : "" );
                $tag->slug = \Str::slug($uniqSlug);
                $alreadyExists = static::where('slug', $tag->slug)->exists();
                $i++;
            }while($alreadyExists);

        });
    }
}
