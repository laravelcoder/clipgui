<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b96c2a6947c3RelationshipsToClipFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clip_filters', function(Blueprint $table) {
            if (!Schema::hasColumn('clip_filters', 'filters_id')) {
                $table->integer('filters_id')->unsigned()->nullable();
                $table->foreign('filters_id', '205518_5b96c2a5b4032')->references('id')->on('clips')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clip_filters', function(Blueprint $table) {
            
        });
    }
}
