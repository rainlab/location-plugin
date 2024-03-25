<?php

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rainlab_location_states', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->string('code');
            $table->boolean('is_enabled')->default(true);
            $table->bigInteger('country_id')->unsigned()->nullable()->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rainlab_location_states');
    }
};
