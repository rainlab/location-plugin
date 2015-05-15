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

This will automatically create two "belongs to" relationships:

1. **state** - relation for RainLab\Location\Models\State
1. **country** - relation for RainLab\Location\Models\Country

#### Back-end usage

You are free to add the following form field definitions:

    country:
        label: Country
        type: dropdown
        placeholder: -- select --

    state:
        label: State
        type: dropdown
        placeholder: -- select --
        dependsOn: country

#### Front-end usage

The front-end can also use the relationships by creating a partial called **country-state** with the content:

    {% set countryId = countryId|default(form_value('country_id')) %}
    {% set stateId = stateId|default(form_value('state_id')) %}

    <div class="form-group">
        <label for="accountCountry">Country</label>
        {{ form_select_country('country_id', countryId, {
            id: 'accountCountry',
            class: 'form-control',
            emptyOption: '',
            'data-request': 'onInit',
            'data-request-update': {
                'country-state': '#partialCountryState'
            }
        }) }}
    </div>

    <div class="form-group">
        <label for="accountState">State</label>
        {{ form_select_state('state_id', countryId, stateId, {
            id: 'accountState',
            class: 'form-control',
            emptyOption: ''
        }) }}
    </div>

This partial can be rendered in a form with the following:

    <div id="partialCountryState">
        {% partial 'country-state' countryId=user.country_id stateId=user.state_id %}
    </div>

#### Short code accessors

The behavior will also add a special short code accessor and setter to the model that converts `country_code` and `state_code` to their respective identifiers.

    // Softly looks up and sets the country_id and state_id
    // for these Country and State relations.

    $model->country_code = "US";
    $model->state_code = "FL";
    $model->save();

### Address Finder Form Widget

This plugin introduces an address lookup form field called `addressfinder`. The form widget renders a Google Maps autocomplete address field that automatically populates mapped fields based on the value entered and selected in the address.

Available mappings:

- street
- city
- zip
- state
- country
- country-long
- latitude
- longitude

Usage:

    # ===================================
    #  Form Field Definitions
    # ===================================

    fields:
        address:
            label: Address
            type: addressfinder
            fieldMap:
                latitude: latitude
                longitude: longitude
                city: city
                zip: zip
                country: country_code
                state: state_code

            city:
                label: City
            zip:
                label: Zip
            country_code:
                label: Country
            state_code:
                label: State
            latitude:
                label: Latitude
            longitude:
                label: Longitude
