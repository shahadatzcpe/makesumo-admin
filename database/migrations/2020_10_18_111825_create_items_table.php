<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index('items_slug');
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->string('thumbnail_path', 100)->nullable();
            $table->unsignedBigInteger('asset_set_id');
            $table->enum('asset_type', config_keys('makesumo.asset_types'));
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
        Schema::dropIfExists('items');
    }
}
