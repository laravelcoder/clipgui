<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b995216484c15b99521644eb9ClipStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('clip_state');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('clip_state')) {
            Schema::create('clip_state', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('clip_id')->unsigned()->nullable();
            $table->foreign('clip_id', 'fk_p_205512_205519_state__5b96c439941eb')->references('id')->on('clips');
                $table->integer('state_id')->unsigned()->nullable();
            $table->foreign('state_id', 'fk_p_205519_205512_clip_s_5b96c43995402')->references('id')->on('states');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
