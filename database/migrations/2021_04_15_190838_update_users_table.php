<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Driver\PDOMySql\Driver;

class UpdateusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->string('email_verify')->nullable()->change();
        });
    }

    public function down(){
        Schema::table('users', function (Blueprint $table) {
            $table->string('email_verify')->nullable(false)->change();
        });
    }
}
