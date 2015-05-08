# Location plugin

This plugin adds location based features to [OctoberCMS](http://octobercms.com).

* Easily add Country and State to any model
* Form widget for address lookups (Google API)

### Add Country and State to any model

This plugin provides an easy way to add location fields, country and state, to any model. Simply add these columns to the database table:

    $table->integer('country_id')->unsigned()->nullable()->index();
    $table->integer('state_id')->unsigned()->nullable()->index();

Then implement the **RainLab.Location.Behaviors.LocationModel** behavior in the model class:

    public $implement = ['RainLab.Location.Behaviors.LocationModel'];

Then you are free to add the form field definitions:

    country:
        label: Country
        type: dropdown
        placeholder: -- select --

    state:
        label: State
        type: dropdown
        placeholder: -- select --
        dependsOn: country
