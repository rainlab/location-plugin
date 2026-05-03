<?php

use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;

/**
 * CountryTest covers the Country model
 */
class CountryTest extends PluginTestCase
{
    /**
     * setUp resets static caches between tests
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->resetStaticCaches();
    }

    /**
     * resetStaticCaches clears the in-memory list caches
     */
    protected function resetStaticCaches()
    {
        $ref = new ReflectionClass(Country::class);
        $prop = $ref->getProperty('objectList');
        $prop->setAccessible(true);
        $prop->setValue(null, null);

        $prop = $ref->getProperty('nameList');
        $prop->setAccessible(true);
        $prop->setValue(null, null);

        $ref = new ReflectionClass(State::class);
        $prop = $ref->getProperty('objectList');
        $prop->setAccessible(true);
        $prop->setValue(null, []);

        $prop = $ref->getProperty('nameList');
        $prop->setAccessible(true);
        $prop->setValue(null, []);
    }

    //
    // CRUD
    //

    public function testCreateCountry()
    {
        $country = Country::create([
            'name' => 'Testland',
            'code' => 'tl',
        ]);

        $this->assertNotNull($country->id);
        $this->assertEquals('Testland', $country->name);
        $this->assertEquals('tl', $country->code);
    }

    public function testFindByCode()
    {
        $country = Country::create(['name' => 'Testland', 'code' => 'tl']);

        $found = Country::findByCode('tl');
        $this->assertNotNull($found);
        $this->assertEquals($country->id, $found->id);
    }

    public function testFindByCodeReturnsNullForInvalid()
    {
        $this->assertNull(Country::findByCode('nonexistent'));
    }

    //
    // Validation
    //

    public function testRequiresName()
    {
        $this->expectException(\October\Rain\Database\ModelException::class);

        Country::create(['name' => '', 'code' => 'xx']);
    }

    public function testRequiresUniqueCode()
    {
        Country::create(['name' => 'First', 'code' => 'dup']);

        $this->expectException(\October\Rain\Database\ModelException::class);

        Country::create(['name' => 'Second', 'code' => 'dup']);
    }

    //
    // Relationships
    //

    public function testHasManyStates()
    {
        $country = Country::create(['name' => 'Testland', 'code' => 'tl']);

        $state = new State;
        $state->name = 'Test State';
        $state->code = 'ts';
        $state->country_id = $country->id;
        $state->forceSave();

        $this->assertEquals(1, $country->states()->count());
        $this->assertEquals('Test State', $country->states->first()->name);
    }

    public function testFetchStates()
    {
        $country = Country::create(['name' => 'Testland', 'code' => 'tl']);

        $state = new State;
        $state->name = 'Alpha State';
        $state->code = 'as';
        $state->country_id = $country->id;
        $state->forceSave();

        $states = $country->fetchStates();
        $this->assertCount(1, $states);
        $this->assertEquals('Alpha State', $states->first()->name);
    }

    //
    // Scopes
    //

    public function testScopeApplyEnabled()
    {
        $enabled = Country::create(['name' => 'Enabled', 'code' => 'en']);
        $enabled->is_enabled = true;
        $enabled->forceSave();

        $disabled = Country::create(['name' => 'Disabled', 'code' => 'di']);
        $disabled->is_enabled = false;
        $disabled->forceSave();

        $results = Country::applyEnabled()->get();
        $ids = $results->pluck('id')->all();

        $this->assertContains($enabled->id, $ids);
        $this->assertNotContains($disabled->id, $ids);
    }

    //
    // Object and Name Lists
    //

    public function testGetObjectListReturnsEnabledCountries()
    {
        // Disable all seeded countries first
        Country::query()->update(['is_enabled' => false]);
        $this->resetStaticCaches();

        $enabled = Country::create(['name' => 'Enabled Country', 'code' => 'ec']);
        $enabled->is_enabled = true;
        $enabled->forceSave();

        $disabled = Country::create(['name' => 'Disabled Country', 'code' => 'dc']);
        $disabled->is_enabled = false;
        $disabled->forceSave();

        $this->resetStaticCaches();
        $list = Country::getObjectList();

        $ids = $list->pluck('id')->all();
        $this->assertContains($enabled->id, $ids);
        $this->assertNotContains($disabled->id, $ids);
    }

    public function testGetObjectListPinnedFirst()
    {
        Country::query()->update(['is_enabled' => false]);
        $this->resetStaticCaches();

        $unpinned = Country::create(['name' => 'AAA Unpinned', 'code' => 'au']);
        $unpinned->is_enabled = true;
        $unpinned->is_pinned = false;
        $unpinned->forceSave();

        $pinned = Country::create(['name' => 'ZZZ Pinned', 'code' => 'zp']);
        $pinned->is_enabled = true;
        $pinned->is_pinned = true;
        $pinned->forceSave();

        $this->resetStaticCaches();
        $list = Country::getObjectList();

        $this->assertEquals($pinned->id, $list->first()->id);
    }

    public function testGetObjectListIsCached()
    {
        Country::query()->update(['is_enabled' => false]);
        $this->resetStaticCaches();

        $country = Country::create(['name' => 'Cached', 'code' => 'cc']);
        $country->is_enabled = true;
        $country->forceSave();

        $this->resetStaticCaches();
        $list1 = Country::getObjectList();
        $list2 = Country::getObjectList();

        $this->assertSame($list1, $list2);
    }

    public function testGetNameListReturnsNameIdPairs()
    {
        Country::query()->update(['is_enabled' => false]);
        $this->resetStaticCaches();

        $country = Country::create(['name' => 'Named Country', 'code' => 'nc']);
        $country->is_enabled = true;
        $country->forceSave();

        $this->resetStaticCaches();
        $list = Country::getNameList();

        $this->assertArrayHasKey($country->id, $list);
        $this->assertEquals('Named Country', $list[$country->id]);
    }

    //
    // Pinning
    //

    public function testPinCountry()
    {
        $country = Country::create(['name' => 'Pinnable', 'code' => 'pn']);
        $this->assertFalse((bool) $country->is_pinned);

        $country->is_pinned = true;
        $country->forceSave();

        $country->refresh();
        $this->assertTrue((bool) $country->is_pinned);
    }

    //
    // Enable/Disable
    //

    public function testEnableCountry()
    {
        $country = Country::create(['name' => 'Togglable', 'code' => 'tg']);
        $this->assertFalse((bool) $country->is_enabled);

        $country->is_enabled = true;
        $country->forceSave();

        $country->refresh();
        $this->assertTrue((bool) $country->is_enabled);
    }

    //
    // ISO and calling codes
    //

    public function testCountryWithIsoCode()
    {
        $country = Country::create(['name' => 'Iso Land', 'code' => 'il']);
        $country->iso_code = 'IL';
        $country->forceSave();

        $country->refresh();
        $this->assertEquals('IL', $country->iso_code);
    }

    public function testCountryWithCallingCode()
    {
        $country = Country::create(['name' => 'Call Land', 'code' => 'cl']);
        $country->calling_code = '99';
        $country->forceSave();

        $country->refresh();
        $this->assertEquals('99', $country->calling_code);
    }

    //
    // Filling
    //

    public function testFillableAttributes()
    {
        $country = new Country;
        $country->fill(['name' => 'Filled', 'code' => 'fl', 'calling_code' => '99']);

        $this->assertEquals('Filled', $country->name);
        $this->assertEquals('fl', $country->code);
        $this->assertEquals('99', $country->calling_code);
    }
}
