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
            $table->increments('id');
            $table->timestamps();
            $table->string('street', 50);
            //$table->string('secondline', 50)->nullable(); // Finally removed, i think useless.
            
            // Here I set the foreign key for relation :
            // (1,1) City reference (0,N) addresses
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('restrict'); // todo try to put 'restr': means it will delete in cascade only if no cities tuples attached to a user.

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
        Schema::dropIfExists('addresses');
    }
}
