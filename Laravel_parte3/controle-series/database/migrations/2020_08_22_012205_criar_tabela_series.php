<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaSeries extends Migration
{
    public function up()
    {
        Schema::create('series', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });

    }

    public function down()
    {
        Schema::drop('series');

    }
}
