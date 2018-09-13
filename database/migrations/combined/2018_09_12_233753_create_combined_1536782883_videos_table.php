<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1536782883VideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('videos')) {
            Schema::create('videos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('original_name')->nullable();
                $table->string('disk')->nullable();
                $table->string('path')->nullable();
                $table->text('description')->nullable();
                $table->string('clip_upload')->nullable();
                $table->text('notes')->nullable();
                $table->datetime('converted_for_downloading_at')->nullable();
                $table->datetime('converted_for_streaming_at')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
