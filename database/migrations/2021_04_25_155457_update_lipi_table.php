<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLipiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lipi', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->string('name')->longText()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lipi', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
            $table->string('name')->longText()->change();
        });
    }
}
