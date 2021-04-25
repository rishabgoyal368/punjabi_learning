<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Driver\PDOMySql\Driver;

class UpdateKhani1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('khani', function (Blueprint $table) {
            $table->longText('name')->change();
        });
    }

    public function down(){
        Schema::table('khani', function (Blueprint $table) {
            $table->longText('name')->change();
        });
    }
}
