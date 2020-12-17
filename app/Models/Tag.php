<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    const DEFAULT_LIMIT = 8;

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


    public function items()
    {
        return $this->morphedByMany(Item::class, 'taggable');
    }

    public function illustrations()
    {
        return $this->items()->where('asset_type', Item::ILLUSTRATION);
    }

    public function icons()
    {
        return $this->items()->where('asset_type', Item::ICON);
    }

    public function illustrations3d()
    {
        return $this->items()->where('asset_type', Item::ILLUSTRATION3D);
    }
}
