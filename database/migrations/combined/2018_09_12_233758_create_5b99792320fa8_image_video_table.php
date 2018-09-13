<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b99792320fa8ImageVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('image_video')) {
            Schema::create('image_video', function (Blueprint $table) {
                $table->integer('image_id')->unsigned()->nullable();
                $table->foreign('image_id', 'fk_p_207143_207162_video__5b9979232119c')->references('id')->on('images')->onDelete('cascade');
                $table->integer('video_id')->unsigned()->nullable();
                $table->foreign('video_id', 'fk_p_207162_207143_image__5b997923212aa')->references('id')->on('videos')->onDelete('cascade');
                
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
        Schema::dropIfExists('image_video');
    }
}
