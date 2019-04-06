<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTagConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_tag_connections', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            // Here I set the foreign key for relation :
            // (1,1) Material reference (0,N) materialTagConnections
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')
                    ->references('id')
                    ->on('tags')
                    ->onDelete('cascade');

            // Here I set the foreign key for relation :
            // (1,1) categories reference (0,N) materialTagConnections
            $table->unsignedInteger('material_id');
            $table->foreign('material_id')
                    ->references('id')
                    ->on('materials')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_tag_connections');
    }
}
