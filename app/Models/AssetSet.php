<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AssetSet extends Model
{
    use HasFactory;

    protected $appends = [
        'thumbnail_src'
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
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    public function getThumbnailSrcAttribute()
    {
        return Storage::url($this->thumbnail_path);
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
        });
    }
}
