<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->notNullable();
            $table->string('title')->notNullable();
            $table->string('author')->notNullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('personal_rating')->nullable();
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::statement('
        ALTER TABLE books
        ADD CONSTRAINT date_timeline_check CHECK (end_date >= start_date),
        ADD CONSTRAINT personal_rating_check CHECK (personal_rating >=0 AND personal_rating <= 5)
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
