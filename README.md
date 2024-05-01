# Location plugin

This plugin adds location based features to [October CMS](https://octobercms.com).

* Easily add Country and State to any model
* Form widget for address lookups (Google API)

View this plugin on the October CMS marketplace:

- https://octobercms.com/plugin/rainlab-location

### Extended features

To integrate locations with front-end users, consider also installing the `RainLab.UserPlus` plugin.

- https://octobercms.com/plugin/rainlab-userplus

### Google API key requirement

Using the Google Maps service requires an API key. You may generate a key from the following link:

- [Get a Google API key](https://developers.google.com/maps/documentation/javascript/get-api-key)

Copy the key and enter it in the **Settings > Location settings** area. If you find the address finder is not working, you may need to enable the [Places API](https://console.developers.google.com/apis/api/places_backend/overview?project=_) and the [Maps JavaScript API](https://console.developers.google.com/apis/api/maps_backend/overview?project=_).

### Add Country and State to any model

This plugin provides an easy way to add location fields, country and state, to any model. Simply add these columns to the database table:

```php
$table->integer('country_id')->unsigned()->nullable()->index();
$table->integer('state_id')->unsigned()->nullable()->index();
```

Then implement the **RainLab\Location\Traits\LocationModel** trait in the model class:

```php
use \RainLab\Location\Traits\LocationModel;
```

This will automatically create two "belongs to" relationships:

1. **state** - relation for RainLab\Location\Models\State
1. **country** - relation for RainLab\Location\Models\Country

### Back-end usage

#### Forms

You are free to add the following form field definitions:

```yaml
country:
    label: Country
    type: dropdown
    span: left
    placeholder: -- select country --

state:
    label: State
    type: dropdown
    span: right
    dependsOn: country
    placeholder: -- select state --
```

#### Lists

For the list column definitions, you can use the following snippet:

```yaml
country:
    label: Country
    searchable: true
    relation: country
    select: name
    sortable: false

state:
    label: State
    searchable: true
    relation: state
    select: name
    sortable: false
```

### Front-end usage

The front-end can also use the relationships by rendering the `@form-select-country` and `@form-select-state` partials provided by the location component. Before proceeding, make sure you have the `location` component attached to the page or layout.

```twig
<div class="form-group">
    <label for="accountCountry">Country</label>
    {% partial '@form-select-country' countryId=user.country_id %}
</div>

<div class="form-group">
    <label for="accountState">State</label>
    {% partial '@form-select-state' countryId=user.country_id stateId=user.state_id %}
</div>
```

### Short Code Accessors

The behavior will also add a special short code accessor and setter to the model that converts `country_code` and `state_code` to their respective identifiers.

```php
// Softly looks up and sets the country_id and state_id
// for these Country and State relations.

$model->country_code = "US";
$model->state_code = "FL";
$model->save();
```

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

By default the `street` mapper places the house number before the street name. However in some countries the number is commonly placed after the street name. You can reverse the order by using the `reverseStreetNumber: true` option.

Usage:

```yaml
# ===================================
#  Form Field Definitions
# ===================================

fields:
    address:
        label: Address
        type: addressfinder
        countryRestriction: 'us,ch'
        reverseStreetNumber: false
        fieldMap:
            latitude: latitude
            longitude: longitude
            city: city
            zip: zip
            street: street
            country: country_code
            state: state_code
            vicinity: vicinity

    city:
        label: City
    zip:
        label: Zip
    street:
        label: Street
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
```

### License

This plugin is an official extension of the October CMS platform and is free to use if you have a platform license. See [EULA license](LICENSE.md) for more details.
