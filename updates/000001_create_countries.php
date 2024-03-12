<?php

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rainlab_location_countries', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->string('code');
            $table->string('iso_code')->nullable();
            $table->string('calling_code')->nullable();
            $table->boolean('is_enabled')->default(false);
            $table->boolean('is_enabled_edit')->default(false);
            $table->boolean('is_pinned')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('rainlab_location_countries');
    }
};
