<?php namespace RainLab\Location\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateStatesTable extends Migration
{

    public function up()
    {
        /*
         * The states table was previously owned by RainLab.User
         * so this occurance is detected and the table renamed.
         * @deprecated Safe to remove if year >= 2017
         */
        if (Schema::hasTable('rainlab_user_states')) {
            Schema::rename('rainlab_user_states', 'rainlab_location_states');
            return;
        }

        Schema::create('rainlab_location_states', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('country_id')->unsigned()->index();
            $table->string('name')->index();
            $table->string('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rainlab_location_states');
    }

}
