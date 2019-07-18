<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

          //assegno la colonna category_id che sarà un intero e ricordarsi di inserire
          //unsigned()->after('id')->nullable() se non metto nullable mi da valori 0 e non posso
          //assegnare id dal menù a tendina
          $table->integer('category_id')->unsigned()->after('id')->nullable();
        //devo anche dire che questa è una chiave esterna il cui id (reference(id))
        //si collega alla tabella categories (on (categories))
          $table->foreign('category_id')->references('id')->on('categories');

        //scrivo il down che è sotto
        //fatto questo devo dire ai 2 Model che esiste la chiave esterna
        //quindi vado prima su App
        //1)Post scrivo collegamento molti a 1
        //2)Category scrivo collegamento 1 a molti
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
