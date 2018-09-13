<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b9979231b175ClipImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clip_image')) {
            Schema::create('clip_image', function (Blueprint $table) {
                $table->integer('clip_id')->unsigned()->nullable();
                $table->foreign('clip_id', 'fk_p_205512_207143_image__5b9979231b36c')->references('id')->on('clips')->onDelete('cascade');
                $table->integer('image_id')->unsigned()->nullable();
                $table->foreign('image_id', 'fk_p_207143_205512_clip_i_5b9979231b4bf')->references('id')->on('images')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clip_image');
    }
}
