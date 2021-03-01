<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapybarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capybaras', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('color', ['brown', 'gray', 'yellow', 'black']);
            $table->enum('size', ['small', 'medium', 'large']);
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
        Schema::dropIfExists('capybaras');
    }
}
