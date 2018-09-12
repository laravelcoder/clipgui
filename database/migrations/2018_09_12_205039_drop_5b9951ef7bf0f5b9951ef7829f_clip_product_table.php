<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b9951ef7bf0f5b9951ef7829fClipProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('clip_product');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('clip_product')) {
            Schema::create('clip_product', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('clip_id')->unsigned()->nullable();
            $table->foreign('clip_id', 'fk_p_205512_205521_produc_5b96ec39d1cf1')->references('id')->on('clips');
                $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id', 'fk_p_205521_205512_clip_p_5b96ec39d2f6b')->references('id')->on('products');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
