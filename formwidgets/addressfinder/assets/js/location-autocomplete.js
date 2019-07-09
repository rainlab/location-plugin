/*
 * Location Autocomplete plugin
 *
 * Data attributes:
 * - data-control="location-autocomplete" - enables the plugin on an element
 * - data-input-street="#locationStreet" - input to populate with street
 * - data-input-city="#locationCity" - input to populate with city
 * - data-input-county="#locationCounty" - input to populate with county
 * - data-input-state="#locationState" - input to populate with state
 * - data-input-zip="#locationZip" - input to populate with zip
 * - data-input-country="#locationCountry" - input to populate with country
 * - data-input-country-long="#locationCountry" - input to populate with country (long name)
 * - data-input-latitude="#locationLatitude" - input to populate with latitude
 * - data-input-longitude="#locationLongitude" - input to populate with longitude
 *
 * JavaScript API:
 * $('input#addressAutocomplete').locationAutocomplete({ inputCountry: '#locationCountry' })
 *
 * Dependences:
 * - Google maps (http://maps.googleapis.com/maps/api/js?libraries=places&amp;sensor=false)
 *
 * Example markup:
 *
    <input
        type="text"
        class="form-control"
        data-control="location-autocomplete"
        data-country-restriction="us,ch"
        data-input-street="#inputStreet"
        data-input-city="#locationCity"
        data-input-county="#locationCounty"
        data-input-state="#locationState"
        data-input-zip="#locationZip"
        data-input-country="#locationCountry"
        />

    <input type="text" name="street" value="" id="inputStreet" />
    <input type="text" name="city" value="" id="locationCity" />
    <input type="text" name="county" value="" id="locationCounty" />
    <input type="text" name="state" value="" id="locationState" />
    <input type="text" name="zip" value="" id="locationZip" />
    <input type="text" name="country" value="" id="locationCountry" />
 *
 */


+function ($, map) { "use strict";

    // LOCATION AUTOCOMPLETE CLASS DEFINITION
    // ============================

    var LocationAutocomplete = function(element, options) {
        this.options   = options
        this.$el       = $(element)

        // Init
        this.init()
    }

    LocationAutocomplete.DEFAULTS = {
        inputLatitude: null,
        inputLongitude: null,
        inputStreet: null,
        inputCity: null,
        inputCounty: null,
        inputState: null,
        inputZip: null,
        inputVicinity: null,
        inputCountry: null,
        inputCountryLong: null
    }

    LocationAutocomplete.prototype.init = function() {
        var autocompleteOptions = {
            types: ['geocode']
        }
        var countryRestriction = this.$el.data('countryRestriction')
        if (countryRestriction) {
            var countryCodes = countryRestriction.split(',').map(function(code) {
                return code.trim();
            });
            autocompleteOptions['componentRestrictions'] = {
                'country': countryCodes
            }
        }
        this.autocomplete = new map.places.Autocomplete(this.$el.get(0), autocompleteOptions)

        map.event.addListener(this.autocomplete, 'place_changed', $.proxy(this.handlePlaceChanged, this))

        // Prevent ENTER from submitting form
        this.$el.bind('keypress keydown keyup', function(e){
            if (e.keyCode == 13) { e.preventDefault() }
        })
    }

    LocationAutocomplete.prototype.getValueMap = function() {
        return {
            'geometry': {
                inputLatitude: 'lat',
                inputLongitude: 'lng'
            },
            'short': {
                inputStreet: ['street_number', 'route'],
                inputCity: ['locality', 'postal_town'],
                inputCounty: 'administrative_area_level_2',
                inputState: 'administrative_area_level_1',
                inputZip: 'postal_code',
                inputCountry: 'country'
            },
            'long': {
                inputCountryLong: 'country'
            },
            'misc': {
                inputVicinity: 'vicinity'
            }
        }
    }

    LocationAutocomplete.prototype.handlePlaceChanged = function() {

        var self = this,
            place = this.autocomplete.getPlace(),
            geoLocation = place.geometry.location,
            valueMap = this.getValueMap()

        var extractionFunction = function(standard, google, resultType) {
            var value = []

            if (!$.isArray(google))
                google = [google]

            $.each(google, function(index, _google) {
                value.push(self.getValueFromAddressObject(place, _google))
            })

            return value.join(' ')
        }

        var elementFinderFunction = function(lookupKey) {
            if (self.options[lookupKey] === undefined)
                return

            var element = $(self.options[lookupKey])

            if (element.length == 0)
                return

            return element
        }

        $.each(valueMap['geometry'], function(standard, google){
            var $targetEl = elementFinderFunction(standard)
            if (!$targetEl) return

            if (google == 'lat') $targetEl.val(geoLocation.lat())
            else if (google == 'lng') $targetEl.val(geoLocation.lng())
        })

        $.each(valueMap['short'], function(standard, google){
            var $targetEl = elementFinderFunction(standard)
            if (!$targetEl) return

            $targetEl.val(extractionFunction(standard, google))
        })

        $.each(valueMap['long'], function(standard, google){
            var $targetEl = elementFinderFunction(standard)
            if (!$targetEl) return

            $targetEl.val(extractionFunction(standard, google, 'long_name'))
        })

        $.each(valueMap['misc'], function(standard, google){
            var $targetEl = elementFinderFunction(standard)
            if (!$targetEl) return

            $targetEl.val(place[google])
        })

        this.$el.trigger('changedLocation')
    }

    /*
     * Helper to spin through a Google address object and return
     * the value based on its type, eg: country
     *
     * Type guide:
     * -----------
     * street_number               = Street Number
     * route                       = Street
     * locality                    = City
     * administrative_area_level_2 = County
     * administrative_area_level_1 = State
     * postal_code                 = Zip
     * country                     = Country
     *
     */
    LocationAutocomplete.prototype.getValueFromAddressObject = function(addressObj, type, resultType) {
        var self = this
        var result = null
        if (!resultType)
            resultType = 'short_name'

        if (!addressObj)
            return null

        for (var i = 0; i < addressObj.address_components.length; i++) {
            for (var j = 0; j < addressObj.address_components[i].types.length; j++) {
                if (addressObj.address_components[i].types[j] == type)
                    result = addressObj.address_components[i][resultType]
            }
        }

        return result
    }

    // LOCATION AUTOCOMPLETE PLUGIN DEFINITION
    // ============================

    var old = $.fn.locationAutocomplete

    $.fn.locationAutocomplete = function (option) {
        var args = Array.prototype.slice.call(arguments, 1), result
        this.each(function () {
            var $this   = $(this)
            var data    = $this.data('ui.location-autocomplete')
            var options = $.extend({}, LocationAutocomplete.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('ui.location-autocomplete', (data = new LocationAutocomplete(this, options)))
            if (typeof option == 'string') result = data[option].apply(data, args)
            if (typeof result != 'undefined') return false
        })

        return result ? result : this
    }

    $.fn.locationAutocomplete.Constructor = LocationAutocomplete

    // LOCATION AUTOCOMPLETE NO CONFLICT
    // =================

    $.fn.locationAutocomplete.noConflict = function () {
        $.fn.locationAutocomplete = old
        return this
    }

    // LOCATION AUTOCOMPLETE DATA-API
    // ===============

    $(document).render(function() {
        $('[data-control="location-autocomplete"]').locationAutocomplete()
    })

}(window.jQuery, google.maps);
