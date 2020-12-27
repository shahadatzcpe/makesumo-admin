<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    const ILLUSTRATION = 'illustration';
    const ILLUSTRATION3D = 'illustration3d';
    const ICON = 'icon';

    use HasFactory;


    protected $appends = ['width', 'height'];

    public function getWidthAttribute() {
        return 1925;
    }
    public function getHeightAttribute() {
        return 2378;
    }

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
        return $this->hasMany(Asset::class)->orderBy('precedence')->orderByDesc('original_name');
    }

    public function colors()
    {
        return $this->hasManyThrough(
            Color::class,
            Asset::class,
            'item_id', // Foreign key on users table...
            'colorable_id' // Foreign key on posts table...
        )->where('colorable_type', Asset::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function updateTags($tags)
    {
        // First we will salitize tags becasue
        // we remove whitespace and make first letter upper case
        $tags = array_map(function($tag) {
            return ucfirst(trim($tag));
        }, $tags);

        //Then, We will find if any tag available in database
        //Bacause we dont want to inser same tag twice
        $tagObjects = Tag::whereIn('name', $tags)->get();
        $tagsFromDb = $tagObjects->pluck('name')->toArray();

        //Then we find which tag is not available in database,
        // We will insert this tag to the database.
        $needToInsert = array_diff($tags, $tagsFromDb);

        $insertedTagIds = [];
        foreach ($needToInsert as $tagTxt) {
            $tag = new Tag();
            $tag->name = $tagTxt;
            $tag->save();
            $insertedTagIds[] = $tag->id;
        }

        //Now we will update relationship with this item and tags
        $tagIds = $tagObjects->pluck('id')->toArray() + $insertedTagIds;
        $this->tags()->sync($tagIds);
    }


    public function scopeFilter($query, $filters) {
        $query->when($filters['search'] ?? null, function($query, $search) {
            $query->where('name', 'like', "%$search%");
        });

        return $query;
    }


    public function assetSet()
    {
        return $this->belongsTo(AssetSet::class);
    }

    public function getUrlAttribute() {

        switch ($this->asset_type) {
            case '3d':
                return route('frontend.illustrations3d.assets-set', $this->slug);

                break;
        }

        return route('frontend.illustrations.asset', [$this->assetSet, $this]);
    }
}
