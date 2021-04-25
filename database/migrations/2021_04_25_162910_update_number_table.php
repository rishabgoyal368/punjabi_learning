<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('number', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->longText('audio')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('number', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
            $table->longText('audio')->nullable(false)->change();
        });
    }
}

