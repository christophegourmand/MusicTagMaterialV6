<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('file'); // todo if possible, next time rename it 'name' ,   to make 'photo->name' instead of 'photo->photo' 
            $table->string('description', 100)->nullable();

            // Here I set the foreign key for relation :
            // (1,1) Material reference (0,N) photos
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
        Schema::dropIfExists('photos');
    }
}
