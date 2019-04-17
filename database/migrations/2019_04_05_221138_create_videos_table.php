<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('link');
            $table->string('description')->nullable();

            // Here I set the foreign key for relation :
            // (1,1) Material reference (0,N) videos
            $table->unsignedInteger('material_id');
            $table->foreign('material_id')
                    ->references('id')
                    ->on('materials')
                    ->onDelete('cascade');

            Schema::enableForeignKeyConstraints();
                    
        });
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
