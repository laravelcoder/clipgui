<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b96ecf72a566RelationshipsToClipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clips', function(Blueprint $table) {
            if (!Schema::hasColumn('clips', 'industry_id')) {
                $table->integer('industry_id')->unsigned()->nullable();
                $table->foreign('industry_id', '205512_5b96ecf638a8d')->references('id')->on('industries')->onDelete('cascade');
                }
                if (!Schema::hasColumn('clips', 'brand_id')) {
                $table->integer('brand_id')->unsigned()->nullable();
                $table->foreign('brand_id', '205512_5b96ecf651203')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::table('clips', function(Blueprint $table) {
            
        });
    }
}
