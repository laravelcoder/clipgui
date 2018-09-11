<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1536351236ClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clips', function (Blueprint $table) {
            
if (!Schema::hasColumn('clips', 'clip_upload')) {
                $table->string('clip_upload')->nullable();
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
            $table->dropColumn('clip_upload');
            
        });

    }
}
