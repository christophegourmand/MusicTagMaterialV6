<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 100);
            $table->string('zipcode', 10)->nullable();

            // Here I set the foreign key for relation :
            // (1,1) Country reference (0,N) cities
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')
                    ->references('id')
                    ->on('countries')
                    ->onDelete('cascade'); // todo try to put 'restr': means it will delete in cascade only if no cities tuples attached to an address. 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}