<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelfJunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelf_junctions', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->notNullable();
            $table->unsignedBigInteger('shelf_id')->notNullable();
            #composite primary key
            $table->primary(['book_id', 'shelf_id']);
            $table->timestamps();
        });

        Schema::table('shelf_junctions', function (Blueprint $table){
            $table->foreign('book_id')->reference('id')->on('books');
            $table->foreign('shelf_id')->reference('id')->on('shelves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shelf_junctions');
    }
}
