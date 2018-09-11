<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1536617665IndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industries', function (Blueprint $table) {
            if(Schema::hasColumn('industries', 'clip_id')) {
                $table->dropForeign('205522_5b96ec941be8c');
                $table->dropIndex('205522_5b96ec941be8c');
                $table->dropColumn('clip_id');
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
        Schema::table('industries', function (Blueprint $table) {
                        
        });

    }
}
