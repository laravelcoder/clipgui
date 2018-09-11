<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b96ec94e89e0RelationshipsToIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industries', function(Blueprint $table) {
            if (!Schema::hasColumn('industries', 'clip_id')) {
                $table->integer('clip_id')->unsigned()->nullable();
                $table->foreign('clip_id', '205522_5b96ec941be8c')->references('id')->on('clips')->onDelete('cascade');
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
        Schema::table('industries', function(Blueprint $table) {
            
        });
    }
}
