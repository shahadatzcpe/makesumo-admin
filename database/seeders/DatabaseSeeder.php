<?php

namespace Database\Seeders;

use App\Models\AssetSet;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->name = "Md Shahadat Hossain";
        $user->email = "shahadat.zcpe@gmail.com";
        $user->password = bcrypt('secret');
        $user->save();

        AssetSet::factory()->count(100)->create();
    }
}
