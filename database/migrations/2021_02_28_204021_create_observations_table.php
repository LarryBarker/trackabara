<?php

use App\Models\Capybara;
use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Capybara::class, 'capybara_id');
            $table->foreignIdFor(City::class, 'city_id');
            $table->boolean('wearing_hat')->default(false);
            $table->date('observed_on');
            $table->timestamps();

            $table->unique(['capybara_id', 'city_id', 'observed_on'], 'unique_capybara_observation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observations');
    }
}
