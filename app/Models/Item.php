<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use SoftDeletes;

    const ILLUSTRATION = 'illustration';
    const ILLUSTRATION3D = '3d';
    const ICON = 'icon';


    public static function mapAssetTypeCode($type)
    {
        switch ($type) {
            case self::ILLUSTRATION3D:
                return 2;
            case self::ILLUSTRATION:
                return 1;
            default:
                return 3;
        }
    }

    use HasFactory;

    use Searchable;

    protected $fillable =['page_views'];

    protected $appends = ['width', 'height', 'is_premium'];

    public function getWidthAttribute() {
        return $this->attributes['width'] ?? 0;
    }
    public function getHeightAttribute() {
        return $this->attributes['height'] ?? 0;
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
                return route('frontend.illustrations3d.asset', [$this->slug]);

                break;
        }

        return route('frontend.illustrations.asset', [ $this->slug]);
    }

    public function increasePageViews()
    {
        $this->update(['page_views' => $this->page_views +1]);
    }


    public function updateHeightWidth()
    {
        Log::info("Item ID: {$this->id}, Updating item height width." );
        foreach($this->assets as $asset){
            try {
                $fileLoc = storage_path('app/public/' . $asset->path);
                if( $asset->isSVG()){
                    $xml = file_get_contents($fileLoc);
                    $xmlget = simplexml_load_string($xml);
                    if($xmlget) {
                        $xmlattributes = $xmlget->attributes();
                        $width = (string) $xmlattributes->width;
                        $height = (string) $xmlattributes->height;

                    } else {
                        $width = 0;
                        $height = 0;
                    }
                } else {
                    list($width, $height, $type, $attr) = getimagesize($fileLoc);
                }

                if($height && $width) {
                    $this->height = $height;
                    $this->width = $width;
                    $this->save();
                    break;
                }
            }
            catch (\Exception $exception)
            {
                \Log::error($exception->getMessage(). $exception->getFile() .':' . $exception->getLine() . " - Aset ID:". $asset->id);
            }


            Log::info("Item ID: {$this->id},  Successfully height width updated." );
        }

    }

    public function getIsPremiumAttribute()
    {
        return !$this->is_free;
    }


    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tags' => $this->getTagsAsStringAttribute(),
            'category' => $this->assetSet->name ?? '',
            'asset_type' => self::mapAssetTypeCode($this->assetSet->asset_type ?? ''),
            'keywords' => join(' ', [
                $this->is_premium ? "Premium" : "Free",
                $this->assetSet->asset_type ?? ''
            ]),
            'thumbnail_src' => Storage::url($this->thumbnail_path),
        ];
    }

    private function getTagsAsStringAttribute() {
        return $this->tags->pluck('name')->join(' ');
    }

    public function getSearchNameAttribute() {
        return implode(' ', [
            'id' => $this->id,
            'name' => $this->name,
            'tags' => $this->getTagsAsStringAttribute(),
        ]);
    }
}
