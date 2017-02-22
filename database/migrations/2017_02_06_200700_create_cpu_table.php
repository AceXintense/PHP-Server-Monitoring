<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCPUTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('server_uid');
            $table->integer('cpu_cores');
            $table->integer('cpu_temperature');
            $table->integer('cpu_frequency');
            $table->integer('cpu_load');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpu');
    }
}
