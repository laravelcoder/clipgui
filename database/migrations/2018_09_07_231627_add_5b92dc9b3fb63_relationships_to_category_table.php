<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b92dc9b3fb63RelationshipsToCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function(Blueprint $table) {
            if (!Schema::hasColumn('categories', 'clip_id')) {
                $table->integer('clip_id')->unsigned()->nullable();
                $table->foreign('clip_id', '205511_5b92dc9a9529e')->references('id')->on('clips')->onDelete('cascade');
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
        Schema::table('categories', function(Blueprint $table) {
            
        });
    }
}
