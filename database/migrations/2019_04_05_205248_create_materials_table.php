<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id'); 
            $table->timestamps();
            $table->string('productmodel');
            $table->date('builtyear')->nullable();
            $table->longText('description')->nullable();
            $table->float('price');

            // Here I set the foreign key for relation :
                // (1,1) User sell (0,N) materials
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            // Here I set the foreign key for relation :
                // (0,1) Category reference (0,N) materials
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            Schema::enableForeignKeyConstraints();

            //! dans les 2 fichiers de migrations de users et materials, j'ai passé l'id de 'bigIncrements' à 'increment'
            //! j'ai dû aussi passer la 'foreign key' de 'insignedBigInteger' à 'unsignedInteger', PUIS LA MIGRATION FONCTIONNE !

            // todo quand l'entité catégorie sera créée, ajouter ça : 
                //? mais je suis pas sûr que nullable va ici, et que 'set null' fonctionnera sans erreur.
            // $table->foreign('category_id')->nullable()
            //     ->references('id')->on('categories')
            //     ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
