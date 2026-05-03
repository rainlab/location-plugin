/*
 * Location Autocomplete control
 *
 * Data attributes:
 * - data-control="location-autocomplete" - enables the control on an element
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
 * oc.fetchControl(element, 'location-autocomplete')
 *
 * Dependences:
 * - Google Maps Places API
 */
oc.registerControl('location-autocomplete', class extends oc.ControlBase {
    init() {
        this.autocomplete = null;
    }

    connect() {
        this.initAutocomplete();

        // Prevent ENTER from submitting form
        this.listen('keypress', this.onSuppressEnter);
        this.listen('keydown', this.onSuppressEnter);
        this.listen('keyup', this.onSuppressEnter);
    }

    disconnect() {
        if (this.autocomplete) {
            google.maps.event.clearInstanceListeners(this.autocomplete);
            this.autocomplete = null;
        }
    }

    initAutocomplete() {
        if (typeof google === 'undefined' || !google.maps || !google.maps.places) {
            // Google Maps not ready yet, retry
            setTimeout(this.proxy(this.initAutocomplete), 100);
            return;
        }

        var autocompleteOptions = {
            types: ['geocode', 'establishment']
        };

        var countryRestriction = this.config.countryRestriction;
        if (countryRestriction) {
            var countryCodes = countryRestriction.split(',').map(function(code) {
                return code.trim();
            });
            autocompleteOptions.componentRestrictions = {
                country: countryCodes
            };
        }

        this.autocomplete = new google.maps.places.Autocomplete(this.element, autocompleteOptions);

        google.maps.event.addListener(this.autocomplete, 'place_changed', this.proxy(this.handlePlaceChanged));
    }

    onSuppressEnter(ev) {
        if (ev.keyCode === 13) {
            ev.preventDefault();
        }
    }

    getValueMap() {
        var streetValueMap = ['street_number', 'route'];

        if (this.config.reverseStreetNumber) {
            streetValueMap = ['route', 'street_number'];
        }

        return {
            geometry: {
                inputLatitude: 'lat',
                inputLongitude: 'lng'
            },
            short: {
                inputStreet: streetValueMap,
                inputCity: ['locality', 'postal_town'],
                inputCounty: 'administrative_area_level_2',
                inputState: 'administrative_area_level_1',
                inputZip: 'postal_code',
                inputCountry: 'country'
            },
            long: {
                inputCountryLong: 'country'
            },
            misc: {
                inputVicinity: 'vicinity'
            }
        };
    }

    handlePlaceChanged() {
        var place = this.autocomplete.getPlace(),
            geoLocation = place.geometry.location,
            valueMap = this.getValueMap();

        var self = this;

        var extractionFunction = function(standard, googleType, resultType) {
            var value = [];

            if (!Array.isArray(googleType)) {
                googleType = [googleType];
            }

            googleType.forEach(function(_googleType) {
                value.push(self.getValueFromAddressObject(place, _googleType, resultType));
            });

            return value.join(' ');
        };

        var elementFinderFunction = function(lookupKey) {
            var selector = self.config[lookupKey];
            if (!selector) {
                return;
            }

            var element = document.querySelector(selector);
            if (!element) {
                return;
            }

            return element;
        };

        Object.entries(valueMap.geometry).forEach(function([standard, googleType]) {
            var targetEl = elementFinderFunction(standard);
            if (!targetEl) return;

            if (googleType === 'lat') targetEl.value = geoLocation.lat();
            else if (googleType === 'lng') targetEl.value = geoLocation.lng();
        });

        Object.entries(valueMap.short).forEach(function([standard, googleType]) {
            var targetEl = elementFinderFunction(standard);
            if (!targetEl) return;

            targetEl.value = extractionFunction(standard, googleType);
        });

        Object.entries(valueMap.long).forEach(function([standard, googleType]) {
            var targetEl = elementFinderFunction(standard);
            if (!targetEl) return;

            targetEl.value = extractionFunction(standard, googleType, 'long_name');
        });

        Object.entries(valueMap.misc).forEach(function([standard, googleType]) {
            var targetEl = elementFinderFunction(standard);
            if (!targetEl) return;

            targetEl.value = place[googleType];
        });

        this.element.dispatchEvent(new Event('changedLocation'));
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
    getValueFromAddressObject(addressObj, type, resultType) {
        if (!resultType) {
            resultType = 'short_name';
        }

        if (!addressObj) {
            return null;
        }

        var result = null;

        for (var i = 0; i < addressObj.address_components.length; i++) {
            for (var j = 0; j < addressObj.address_components[i].types.length; j++) {
                if (addressObj.address_components[i].types[j] === type) {
                    result = addressObj.address_components[i][resultType];
                }
            }
        }

        return result;
    }
});
