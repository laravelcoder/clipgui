<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b99523991fc1RelationshipsToClipTable extends Migration
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
                if (!Schema::hasColumn('clips', 'states_id')) {
                $table->integer('states_id')->unsigned()->nullable();
                $table->foreign('states_id', '205512_5b9951cf72bb9')->references('id')->on('states')->onDelete('cascade');
                }
                if (!Schema::hasColumn('clips', 'products_id')) {
                $table->integer('products_id')->unsigned()->nullable();
                $table->foreign('products_id', '205512_5b9951cf8889b')->references('id')->on('products')->onDelete('cascade');
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
            if(Schema::hasColumn('clips', 'industry_id')) {
                $table->dropForeign('205512_5b96ecf638a8d');
                $table->dropIndex('205512_5b96ecf638a8d');
                $table->dropColumn('industry_id');
            }
            if(Schema::hasColumn('clips', 'brand_id')) {
                $table->dropForeign('205512_5b96ecf651203');
                $table->dropIndex('205512_5b96ecf651203');
                $table->dropColumn('brand_id');
            }
            if(Schema::hasColumn('clips', 'states_id')) {
                $table->dropForeign('205512_5b9951cf72bb9');
                $table->dropIndex('205512_5b9951cf72bb9');
                $table->dropColumn('states_id');
            }
            if(Schema::hasColumn('clips', 'products_id')) {
                $table->dropForeign('205512_5b9951cf8889b');
                $table->dropIndex('205512_5b9951cf8889b');
                $table->dropColumn('products_id');
            }
            
        });
    }
}
