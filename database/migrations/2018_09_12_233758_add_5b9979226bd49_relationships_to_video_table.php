<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b9979226bd49RelationshipsToVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function(Blueprint $table) {
            if (!Schema::hasColumn('videos', 'industry_id')) {
                $table->integer('industry_id')->unsigned()->nullable();
                $table->foreign('industry_id', '207162_5b997225b5d53')->references('id')->on('industries')->onDelete('cascade');
                }
                if (!Schema::hasColumn('videos', 'brand_id')) {
                $table->integer('brand_id')->unsigned()->nullable();
                $table->foreign('brand_id', '207162_5b997225d2bba')->references('id')->on('brands')->onDelete('cascade');
                }
                if (!Schema::hasColumn('videos', 'states_id')) {
                $table->integer('states_id')->unsigned()->nullable();
                $table->foreign('states_id', '207162_5b997225edb6b')->references('id')->on('states')->onDelete('cascade');
                }
                if (!Schema::hasColumn('videos', 'products_id')) {
                $table->integer('products_id')->unsigned()->nullable();
                $table->foreign('products_id', '207162_5b99722616041')->references('id')->on('products')->onDelete('cascade');
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
        Schema::table('videos', function(Blueprint $table) {
            if(Schema::hasColumn('videos', 'industry_id')) {
                $table->dropForeign('207162_5b997225b5d53');
                $table->dropIndex('207162_5b997225b5d53');
                $table->dropColumn('industry_id');
            }
            if(Schema::hasColumn('videos', 'brand_id')) {
                $table->dropForeign('207162_5b997225d2bba');
                $table->dropIndex('207162_5b997225d2bba');
                $table->dropColumn('brand_id');
            }
            if(Schema::hasColumn('videos', 'states_id')) {
                $table->dropForeign('207162_5b997225edb6b');
                $table->dropIndex('207162_5b997225edb6b');
                $table->dropColumn('states_id');
            }
            if(Schema::hasColumn('videos', 'products_id')) {
                $table->dropForeign('207162_5b99722616041');
                $table->dropIndex('207162_5b99722616041');
                $table->dropColumn('products_id');
            }
            
        });
    }
}
