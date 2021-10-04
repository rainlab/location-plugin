<?php namespace RainLab\Location\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddCountryCallingCode extends Migration
{
    public function up()
    {
        Schema::table('rainlab_location_countries', function (Blueprint $table) {
            $table->string('calling_code')->nullable();
        });
    }

    public function down()
    {
        Schema::table('rainlab_location_countries', function (Blueprint $table) {
            $table->dropColumn('calling_code');
        });
    }
}
