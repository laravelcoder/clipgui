<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b96c43997005ClipStateTable extends Migration
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
                $table->foreign('clip_id', 'fk_p_205512_205519_state__5b96c4399717f')->references('id')->on('clips')->onDelete('cascade');
                $table->integer('state_id')->unsigned()->nullable();
                $table->foreign('state_id', 'fk_p_205519_205512_clip_s_5b96c43997255')->references('id')->on('states')->onDelete('cascade');
                
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
