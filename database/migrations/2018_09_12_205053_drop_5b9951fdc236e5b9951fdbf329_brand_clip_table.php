<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b9951fdc236e5b9951fdbf329BrandClipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('brand_clip');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('brand_clip')) {
            Schema::create('brand_clip', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id', 'fk_p_205520_205512_clip_b_5b96c7948c188')->references('id')->on('brands');
                $table->integer('clip_id')->unsigned()->nullable();
            $table->foreign('clip_id', 'fk_p_205512_205520_brand__5b96c7948b435')->references('id')->on('clips');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
