<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 50)->index('categories_slug_index');
            $table->string('name', 50);
            $table->text('description');
            $table->string('thumbnail_path', 60);
            $table->string('bg_color', 7);
            $table->string('txt_color', 7);
            $table->enum('cat_type', config_keys('makesumo.asset_types'));
            $table->unsignedBigInteger('page_views')->default(0);
            $table->text('data')->nullable('');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
