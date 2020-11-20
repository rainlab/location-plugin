<?php namespace RainLab\Location\Updates;

use Schema;
use RainLab\Location\Models\Country;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddEnabledStates extends Migration
{
    public function up()
    {
        Schema::table('rainlab_location_states', function(Blueprint $table) {
            $table->boolean('is_enabled')->after('country_id')->default(true);
        });
    }

    public function down()
    {
        Schema::table('rainlab_location_states', function(Blueprint $table) {
            $table->dropColumn('is_enabled');
        });
    }
}
