<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('phone', 20)->nullable();
            $table->string('avatar')->nullable();
            // + adresse_id clé étrangère

            // Here I set the foreign key for relation :
            // (0,1) Addresses reference (1,N) users
            $table->unsignedInteger('address_id')->nullable();
            $table->foreign('address_id')
                    ->references('id')
                    ->on('addresses')
                    ->onDelete('set null');

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
        Schema::dropIfExists('users');
    }
}
