<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialBrandConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_brand_connections', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            // Here I set the foreign key for relation :
            // (1,1) Material reference (1,N) materialBrandConnections
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')
                    ->references('id')
                    ->on('brands')
                    ->onDelete('cascade');

            // Here I set the foreign key for relation :
            // (1,1) brands reference (0,N) materialBrandConnections
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
        Schema::dropIfExists('material_brand_connections');
    }
}
