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
            $table->string('name', 50);
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
            // (1,1) Addresses reference (1,N) users
            $table->unsignedInteger('address_id');
            $table->foreign('address_id')
                    ->references('id')
                    ->on('addresses')
                    ->onDelete('restrict'); // it was 'set null', i decided 'restrict' as now the address is required/mandatory.

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
