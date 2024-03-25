<?php

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('rainlab_location_countries', 'iso_code')) {
            Schema::table('rainlab_location_countries', function(Blueprint $table) {
                $table->string('iso_code')->nullable();
                $table->boolean('is_enabled_edit')->default(false);
            });
        }
    }

    public function down()
    {
    }
};
