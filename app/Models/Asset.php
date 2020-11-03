<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Color;

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
                $coloursPattern = "/(?:#|0x)(?:[a-f0-9]{3}|[a-f0-9]{6})\b|(?:rgb|hsl)a?\([^\)]*\)/i";
                preg_match_all($coloursPattern, $content, $colours);
                $detectedColours = array_unique($colours[0]);
                $colours = [];
                foreach ($detectedColours as $colourCode) {
                    $colour = new Colour();
                    $colour->colour_type = 'detected';
                    $colour->colour_code = $colourCode;
                    $colour->colourable_type = Asset::class;
                    $colour->colourable_id = $asset->id;
                    $colour->is_editable = true;
                    $colour->save();
                    $colours[] = $colour;
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
        return $this->morphMany(Colour::class, 'colourable');
    }
}
