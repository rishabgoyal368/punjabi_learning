<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Driver\PDOMySql\Driver;

class UpdateKhaniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('khani', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->longText('audio')->nullable()->change();
            $table->string('name')->longText()->change();
        });
    }

    public function down(){
        Schema::table('khani', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
            $table->longText('audio')->nullable(false)->change();
            $table->string('name')->longText()->change();
        });
    }
}
