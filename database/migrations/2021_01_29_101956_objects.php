<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Objects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('price');
            $table->string('currency');
            $table->foreignId('city_id');
            $table->foreignId('user_id');
            $table->longText('description');
            $table->string('area');
            $table->string('floor');
            $table->string('rooms_quantity');
            $table->date('date_created');

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
        Schema::dropIfExists('objects');
    }
}
