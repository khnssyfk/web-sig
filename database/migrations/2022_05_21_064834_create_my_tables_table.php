<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_tables', function (Blueprint $table) {
            $table->id();
            $table->title()->varchar;
            $table->Date_Created()->varchar;
            $table->Latitude()->varchar;
            $table->Date_Created()->varchar;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_tables');
    }
};
