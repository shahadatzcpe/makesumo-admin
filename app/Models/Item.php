<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($item) {
            $i = 0;
            do {
                $uniqSlug = $item->name . ( $i ? "-" . $i : "" );
                $item->slug = \Str::slug($uniqSlug);
                $alreadyExists = static::where('slug', $item->slug)->exists();
                $i++;
            }while($alreadyExists);

        });
    }

    public function assets()
    {
        return $this->hasMany(Asset::class)->orderBy('precedence')->orderBy('original_name');
    }

    public function colours()
    {
        return $this->hasManyThrough(
            Colour::class,
            Asset::class,
            'item_id', // Foreign key on users table...
            'colourable_id', // Foreign key on posts table...
        )->where('colourable_type', Asset::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
