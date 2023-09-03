<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDefaultShelves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('shelves')->insert([
            ['name'=>'read'],
            ['name'=>'reading'],
            ['name'=>'tbr']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('shelves')->whereIn('name',['read','reading','tbr'])->delete();
    }
}
