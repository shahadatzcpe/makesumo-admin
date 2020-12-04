<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Asset extends Model
{
    use HasFactory;


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($asset) {

            $ext = strtolower(pathinfo($asset->path, PATHINFO_EXTENSION));

            if($ext == 'svg') {
                $content = Storage::get($asset->path);
                $colorsPattern = "/(?:#|0x)(?:[a-f0-9]{3}|[a-f0-9]{6})\b|(?:rgb|hsl)a?\([^\)]*\)/i";
                preg_match_all($colorsPattern, $content, $colors);
                $detectedcolors = array_unique($colors[0]);
                $colors = [];
                foreach ($detectedcolors as $colorCode) {
                    $color = new Color();
                    $color->color_type = 'detected';
                    $color->color_code = $colorCode;
                    $color->colorable_type = Asset::class;
                    $color->colorable_id = $asset->id;
                    $color->is_editable = true;
                    $color->save();
                    $colors[] = $color;
                }
            }


        });
    }

    public function getSrcAttribute()
    {
        return Storage::url($this->path);
    }

    public function colors()
    {
        return $this->morphMany(Color::class, 'colorable');
    }
}
