<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b96ecf7b3b39ClipProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clip_product')) {
            Schema::create('clip_product', function (Blueprint $table) {
                $table->integer('clip_id')->unsigned()->nullable();
                $table->foreign('clip_id', 'fk_p_205512_205521_produc_5b96ecf7b3c5f')->references('id')->on('clips')->onDelete('cascade');
                $table->integer('product_id')->unsigned()->nullable();
                $table->foreign('product_id', 'fk_p_205521_205512_clip_p_5b96ecf7b3cef')->references('id')->on('products')->onDelete('cascade');
                
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
        Schema::dropIfExists('clip_product');
    }
}
