<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b92dbd73e413VideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('videos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('videos')) {
            Schema::create('videos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('video')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

            $table->index(['deleted_at']);
            });
        }
    }
}
