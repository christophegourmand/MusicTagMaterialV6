<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('firstline', 50);
            $table->string('secondline', 50)->nullable();
            
            // Here I set the foreign key for relation :
            // (1,1) City reference (0,N) addresses
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('cascade'); // todo try to put 'restr': means it will delete in cascade only if no cities tuples attached to a user.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
