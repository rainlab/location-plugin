<?php namespace RainLab\Location\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        /*
         * The countries table was previously owned by RainLab.User
         * so this occurance is detected and the table renamed.
         * @deprecated Safe to remove if year >= 2017
         */
        if (Schema::hasTable('rainlab_user_countries')) {
            Schema::rename('rainlab_user_countries', 'rainlab_location_countries');

            return;
        }

        Schema::create('rainlab_location_countries', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('is_enabled')->default(false);
            $table->string('name')->index();
            $table->string('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rainlab_location_countries');
    }

}
