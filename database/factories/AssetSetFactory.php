<?php

namespace Database\Factories;

use App\Models\AssetSet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssetSetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssetSet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'description' => join(', ', $this->faker->sentences(8)),
            'thumbnail_path' => 'assets/kY1ThRTKgjHKDEnPdOPbIUpIrAZpwhCvQRiLuSvQ.png',
            'bg_color' => $this->faker->hexcolor, // password
            'txt_color' => $this->faker->hexcolor,
            'asset_type' => config_keys('makesumo.asset_types')[rand(0, 3)],
            'page_views' => rand(1000, 10000),
            'extra_data' => json_encode([]),
        ];
    }
}
