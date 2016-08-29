<?php namespace RainLab\Location\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddCountryPinnedFlag extends Migration
{
    public function up()
    {
        Schema::table('rainlab_location_countries', function(Blueprint $table) {
            $table->boolean('is_pinned')->default(false);
        });
    }

    public function down()
    {
        Schema::table('rainlab_location_countries', function(Blueprint $table) {
            $table->dropColumn('is_pinned');
        });
    }
}
