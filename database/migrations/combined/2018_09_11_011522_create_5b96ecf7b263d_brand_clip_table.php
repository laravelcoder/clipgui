<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b96ecf7b263dBrandClipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('brand_clip')) {
            Schema::create('brand_clip', function (Blueprint $table) {
                $table->integer('brand_id')->unsigned()->nullable();
                $table->foreign('brand_id', 'fk_p_205520_205512_clip_b_5b96ecf7b2741')->references('id')->on('brands')->onDelete('cascade');
                $table->integer('clip_id')->unsigned()->nullable();
                $table->foreign('clip_id', 'fk_p_205512_205520_brand__5b96ecf7b27c6')->references('id')->on('clips')->onDelete('cascade');
                
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
        Schema::dropIfExists('brand_clip');
    }
}
