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
        // Справочник овощей которые принимает хранилище
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        // Хранилища
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->integer('id_foods');
            $table->string('name');
            $table->integer('volume');
        });

        // Баланс
        Schema::create('balance', function (Blueprint $table) {
            $table->id();
            $table->integer('id_storages');
            $table->integer('loaded');
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
        Schema::dropIfExists('types_volumes_foods');
    }
};
