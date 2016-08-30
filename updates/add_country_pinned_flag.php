<?php namespace RainLab\Location\Updates;

use Schema;
use RainLab\Location\Models\Country;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddCountryPinnedFlag extends Migration
{
    public function up()
    {
        Schema::table('rainlab_location_countries', function(Blueprint $table) {
            $table->boolean('is_pinned')->default(false);
        });

        Country::whereIn('code', ['AU', 'CA', 'GB', 'US'])->update(['is_pinned' => 1]);
    }

    public function down()
    {
        Schema::table('rainlab_location_countries', function(Blueprint $table) {
            $table->dropColumn('is_pinned');
        });
    }
}
