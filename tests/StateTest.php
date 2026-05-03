<?php

use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;

/**
 * StateTest covers the State model
 */
class StateTest extends PluginTestCase
{
    /**
     * setUp resets static caches between tests
     */
    public function setUp(): void
    {
        parent::setUp();

        $ref = new ReflectionClass(State::class);

        $prop = $ref->getProperty('objectList');
        $prop->setAccessible(true);
        $prop->setValue(null, []);

        $prop = $ref->getProperty('nameList');
        $prop->setAccessible(true);
        $prop->setValue(null, []);
    }

    /**
     * createCountry is a helper
     */
    protected function createCountry(string $name = 'Testland', string $code = 'tl'): Country
    {
        return Country::create(['name' => $name, 'code' => $code]);
    }

    /**
     * createState is a helper
     */
    protected function createState(Country $country, string $name = 'Test State', string $code = 'ts'): State
    {
        $state = new State;
        $state->name = $name;
        $state->code = $code;
        $state->country_id = $country->id;
        $state->forceSave();
        return $state;
    }

    //
    // CRUD
    //

    public function testCreateState()
    {
        $country = $this->createCountry();
        $state = $this->createState($country);

        $this->assertNotNull($state->id);
        $this->assertEquals('Test State', $state->name);
        $this->assertEquals('ts', $state->code);
        $this->assertEquals($country->id, $state->country_id);
    }

    public function testFindByCode()
    {
        $country = $this->createCountry();
        $state = $this->createState($country, 'Findable', 'fn');

        $found = State::findByCode('fn');
        $this->assertNotNull($found);
        $this->assertEquals($state->id, $found->id);
    }

    //
    // Validation
    //

    public function testRequiresName()
    {
        $this->expectException(\October\Rain\Database\ModelException::class);

        $country = $this->createCountry();
        $state = new State;
        $state->name = '';
        $state->code = 'xx';
        $state->country_id = $country->id;
        $state->save();
    }

    public function testRequiresCode()
    {
        $this->expectException(\October\Rain\Database\ModelException::class);

        $country = $this->createCountry();
        $state = new State;
        $state->name = 'No Code';
        $state->code = '';
        $state->country_id = $country->id;
        $state->save();
    }

    //
    // Relationships
    //

    public function testBelongsToCountry()
    {
        $country = $this->createCountry();
        $state = $this->createState($country);

        $stateCountry = $state->country;
        $this->assertNotNull($stateCountry);
        $this->assertEquals($country->id, $stateCountry->id);
    }

    //
    // Scopes
    //

    public function testScopeApplyEnabled()
    {
        $country = $this->createCountry();

        $enabled = $this->createState($country, 'Enabled', 'en');
        $enabled->is_enabled = true;
        $enabled->forceSave();

        $disabled = $this->createState($country, 'Disabled', 'di');
        $disabled->is_enabled = false;
        $disabled->forceSave();

        $results = State::applyEnabled()->get();
        $ids = $results->pluck('id')->all();

        $this->assertContains($enabled->id, $ids);
        $this->assertNotContains($disabled->id, $ids);
    }

    //
    // Object and Name Lists
    //

    public function testGetObjectListReturnsStatesForCountry()
    {
        $country1 = $this->createCountry('Country One', 'c1');
        $country2 = $this->createCountry('Country Two', 'c2');

        $state1 = $this->createState($country1, 'State A', 'sa');
        $state2 = $this->createState($country2, 'State B', 'sb');

        $list = State::getObjectList($country1->id);

        $ids = $list->pluck('id')->all();
        $this->assertContains($state1->id, $ids);
        $this->assertNotContains($state2->id, $ids);
    }

    public function testGetObjectListOrdersByName()
    {
        $country = $this->createCountry();

        $this->createState($country, 'Zebra State', 'zs');
        $this->createState($country, 'Alpha State', 'as');

        $list = State::getObjectList($country->id);

        $this->assertEquals('Alpha State', $list->first()->name);
        $this->assertEquals('Zebra State', $list->last()->name);
    }

    public function testGetObjectListIsCachedPerCountry()
    {
        $country = $this->createCountry();
        $this->createState($country);

        $list1 = State::getObjectList($country->id);
        $list2 = State::getObjectList($country->id);

        $this->assertSame($list1, $list2);
    }

    public function testGetNameListReturnsNameIdPairs()
    {
        $country = $this->createCountry();
        $state = $this->createState($country, 'Named State', 'ns');

        $list = State::getNameList($country->id);

        $this->assertArrayHasKey($state->id, $list);
        $this->assertEquals('Named State', $list[$state->id]);
    }

    //
    // Enable/Disable
    //

    public function testStateEnabledByDefault()
    {
        $country = $this->createCountry();

        // Create state using DB insert to test column default
        Db::table('rainlab_location_states')->insert([
            'name' => 'Default State',
            'code' => 'ds',
            'country_id' => $country->id,
        ]);

        $state = State::where('code', 'ds')->first();
        $this->assertTrue((bool) $state->is_enabled);
    }

    public function testDisableState()
    {
        $country = $this->createCountry();
        $state = $this->createState($country);

        $state->is_enabled = false;
        $state->forceSave();

        $state->refresh();
        $this->assertFalse((bool) $state->is_enabled);
    }

    //
    // Multiple states per country
    //

    public function testMultipleStatesPerCountry()
    {
        $country = $this->createCountry();

        $this->createState($country, 'State One', 's1');
        $this->createState($country, 'State Two', 's2');
        $this->createState($country, 'State Three', 's3');

        $this->assertEquals(3, $country->states()->count());
    }

    public function testStatesIsolatedBetweenCountries()
    {
        $country1 = $this->createCountry('Country A', 'ca');
        $country2 = $this->createCountry('Country B', 'cb');

        $this->createState($country1, 'State A1', 'a1');
        $this->createState($country1, 'State A2', 'a2');
        $this->createState($country2, 'State B1', 'b1');

        $this->assertEquals(2, $country1->states()->count());
        $this->assertEquals(1, $country2->states()->count());
    }

    //
    // Fillable
    //

    public function testFillableAttributes()
    {
        $state = new State;
        $state->fill(['name' => 'Filled State', 'code' => 'fs']);

        $this->assertEquals('Filled State', $state->name);
        $this->assertEquals('fs', $state->code);
    }

    public function testGuardedAttributes()
    {
        $state = new State;
        $state->fill(['name' => 'Test', 'code' => 'tt', 'country_id' => 999]);

        // country_id is guarded and should not be mass assigned
        $this->assertNull($state->country_id);
    }
}
