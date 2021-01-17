<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;
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


    public function toSearchableArray()
    {
        $itemIitles =  $this->items->pluck('name')->join(' ');

        $relatedTags = $this->items->pluck('tags')->map(function($tags) {
            return $tags->pluck('name')->join(' ');
        })->join(' ');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'item_titles' => $itemIitles,
            'related_tags' => $relatedTags,
        ];
    }
}
