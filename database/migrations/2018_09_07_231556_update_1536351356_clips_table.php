<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1536351356ClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clips', function (Blueprint $table) {
            if(Schema::hasColumn('clips', 'category_id')) {
                $table->dropForeign('205512_5b92db6d146ad');
                $table->dropIndex('205512_5b92db6d146ad');
                $table->dropColumn('category_id');
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
        Schema::table('clips', function (Blueprint $table) {
                        
        });

    }
}
