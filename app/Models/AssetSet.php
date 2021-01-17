<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class AssetSet extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $appends = [
        'thumbnail_src',
        'total_items'
    ];

    protected $hidden = [
        'thumbnail_path',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($assetSet) {
            $i = 0;
            do {
                $uniqSlug = $assetSet->name . ( $i ? "-" . $i : "" );
                $assetSet->slug = \Str::slug($uniqSlug);
                $alreadyExists = static::where('slug', $assetSet->slug)->exists();
                $i++;
            }while($alreadyExists);
        });

        static::deleting(function ($assetSet) {
            $assetSet->items()->delete();
        });
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    public function getThumbnailSrcAttribute()
    {
        return Storage::url($this->thumbnail_path);
    }

    public function getUrlAttribute()
    {
        switch ($this->asset_type) {
            case '3d':
                return route('frontend.illustrations3d.assets-set', $this->slug);

                break;
        }
        return route('frontend.illustrations.assets-set', $this->slug);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('name', 'like', '%'.$search.'%');
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        })->when($filters['asset_type'] ?? null, function($query, $asset_type) {
           $query->where('asset_type', $asset_type);
        })
        ->when($filters['subscription'] ?? null, function($query, $subscription) {
            if ($subscription == 'only_free') {
                $query->where('is_free', 1);
            } elseif($subscription == 'only_paid') {
                $query->where('is_free', 0);
            }
        });
    }


    public function getTotalItemsAttribute()
    {
        return $this->items()->count();
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function publishedItems()
    {
        return $this->items()->where('status', 'published');
    }

    public function draftItems()
    {
        return $this->items()->where('status', 'draft');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'items' => $this->items->pluck('search_name')->join(' '),
            'keywords' => join(' ', [
                $this->is_free ? "Free" : "Premium",
                $this->asset_type
            ]),
            'thumbnail_src' => $this->thumbnail_src
        ];
    }
}
