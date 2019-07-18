<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
          // di default quando creo un model mi da $table->bigIncrements('id');
          //poichè però la tipologia dell'id deve essere uguale a quella dell'id
          //inserito in create_posts_tables allora lo cambio in increments ('id')
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();

          //adesso sul terminale lancio php artisan make:migration update_posts_table --table=posts
          //che mi crea il file update....in database/migrations
          //dove inserisco in schema:: table il nome della colonna che sarà la chiave esterna

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
