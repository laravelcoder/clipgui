<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b96ecf7b13d3ClipStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clip_state')) {
            Schema::create('clip_state', function (Blueprint $table) {
                $table->integer('clip_id')->unsigned()->nullable();
                $table->foreign('clip_id', 'fk_p_205512_205519_state__5b96ecf7b14f7')->references('id')->on('clips')->onDelete('cascade');
                $table->integer('state_id')->unsigned()->nullable();
                $table->foreign('state_id', 'fk_p_205519_205512_clip_s_5b96ecf7b15bf')->references('id')->on('states')->onDelete('cascade');
                
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
        Schema::dropIfExists('clip_state');
    }
}
