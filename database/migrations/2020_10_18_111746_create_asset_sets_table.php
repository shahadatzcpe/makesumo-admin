<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_sets', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 50)->index('asset_sets_slug_index');
            $table->string('name', 40);
            $table->text('description');
            $table->text('item_description')->nullable();
            $table->string('thumbnail_path', 60)->nullable();
            $table->string('bg_color', 7)->nullable();
            $table->string('txt_color', 7)->nullable();
            $table->enum('asset_type', config_keys('makesumo.asset_types'));
            $table->unsignedBigInteger('page_views')->default(0);
            $table->text('extra_data')->nullable();
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
