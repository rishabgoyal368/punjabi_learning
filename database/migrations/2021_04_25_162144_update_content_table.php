<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->longText('audio')->nullable()->change();
            $table->string('name')->longText()->change();
            $table->string('order')->longText()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
            $table->longText('audio')->nullable(false)->change();
            $table->string('name')->longText()->change();
            $table->string('order')->longText()->change();
        });
    }
}
