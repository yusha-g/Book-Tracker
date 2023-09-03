<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->notNullable();
            $table->string('username')->notNullable();
            $table->float('avg_rating', 2,1)->notNullable()->default('0');
            $table->integer('total_read')->notNullable()->default('0');
            $table->integer('reading_goal')->notNullable()->default('0');
            $table->timestamps();
        });


        Schema::table('user_profiles', function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::statement('
        ALTER TABLE user_profiles
        ADD CONSTRAINT avg_rating_check CHECK (avg_rating >= 0 AND avg_rating <= 5)
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
