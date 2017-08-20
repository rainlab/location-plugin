# Location plugin

This plugin adds location based features to [OctoberCMS](http://octobercms.com).

* Easily add Country and State to any model
* Form widget for address lookups (Google API)

### Extended features

To integrate locations with front-end users consider installing the [User Plus+ plugin](http://octobercms.com/plugin/rainlab-userplus) (`RainLab.UserPlus`).

### Google API key requirement

As of June 22, 2016 the Google Maps service requires an API key. You may generate a key from the following link:

- [Get a Google API key](https://developers.google.com/maps/documentation/javascript/get-api-key)

Copy the key and enter it in the **Settings > Location settings** area. If you find the address finder is not working, you may need to [enable the Places Web Service](https://console.developers.google.com/apis/api/places_backend/overview?project=_).

### Add Country and State to any model

This plugin provides an easy way to add location fields, country and state, to any model. Simply add these columns to the database table:

    $table->integer('country_id')->unsigned()->nullable()->index();
    $table->integer('state_id')->unsigned()->nullable()->index();

Then implement the **RainLab.Location.Behaviors.LocationModel** behavior in the model class:

    public $implement = ['RainLab.Location.Behaviors.LocationModel'];

This will automatically create two "belongs to" relationships:

1. **state** - relation for RainLab\Location\Models\State
1. **country** - relation for RainLab\Location\Models\Country

### Back-end usage

#### Forms

You are free to add the following form field definitions:

    country:
        label: rainlab.location::lang.country.label
        type: dropdown
        span: left
        placeholder: rainlab.location::lang.country.select

    state:
        label: rainlab.location::lang.state.label
        type: dropdown
        span: right
        dependsOn: country
        placeholder: rainlab.location::lang.state.select

#### Lists

For the list column definitions, you can use the following snippet:

     country:
         label: rainlab.location::lang.country.label
         searchable: true
         relation: country
         select: name
         sortable: false

     state:
         label: rainlab.location::lang.state.label
         searchable: true
         relation: state
         select: name
         sortable: false

### Front-end usage

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

### Short code accessors

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
- vicinity

Available options:

You can restrict the address lookup to certain countries by defining the `countryRestriction` option. The option accepts a comma separated list of ISO 3166-1 ALPHA-2 compatible country codes (see: https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).

Usage:

    # ===================================
    #  Form Field Definitions
    # ===================================

    fields:
        address:
            label: Address
            type: addressfinder
            countryRestriction: 'us,ch'
            fieldMap:
                latitude: latitude
                longitude: longitude
                city: city
                zip: zip
                country: country_code
                state: state_code
                vicinity: vicinity

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
        vicinity:
            label: Vicinity
