<?php

use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;

/**
 * LocationModelTraitTestModel is a test fixture for the LocationModel trait
 */
class LocationModelTraitTestModel extends Model
{
    use \RainLab\Location\Traits\LocationModel;
    use \October\Rain\Database\Traits\Validation;

    public $table = 'location_trait_test';
    public $timestamps = false;
    public $rules = [];
}

/**
 * LocationModelTraitTest covers the LocationModel trait
 */
class LocationModelTraitTest extends PluginTestCase
{
    /**
     * @var Country testCountry
     */
    protected $testCountry;

    /**
     * @var State testState
     */
    protected $testState;

    public function setUp(): void
    {
        parent::setUp();

        Schema::create('location_trait_test', function ($table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
        });

        // Create test country and state for use in tests
        $this->testCountry = Country::create(['name' => 'Testland', 'code' => 'tl']);

        $this->testState = new State;
        $this->testState->name = 'Test Province';
        $this->testState->code = 'tp';
        $this->testState->country_id = $this->testCountry->id;
        $this->testState->save(['force' => true]);
    }

    public function tearDown(): void
    {
        Schema::dropIfExists('location_trait_test');
        parent::tearDown();
    }

    /**
     * createTestModel is a helper
     */
    protected function createTestModel(array $attrs = []): LocationModelTraitTestModel
    {
        $model = new LocationModelTraitTestModel;
        $model->fill(array_merge(['name' => 'Test'], $attrs));
        $model->save();
        return $model;
    }

    //
    // Relationships
    //

    public function testTraitAddsCountryRelation()
    {
        $model = new LocationModelTraitTestModel;
        $this->assertArrayHasKey('country', $model->belongsTo);
    }

    public function testTraitAddsStateRelation()
    {
        $model = new LocationModelTraitTestModel;
        $this->assertArrayHasKey('state', $model->belongsTo);
    }

    public function testSetCountryById()
    {
        $model = $this->createTestModel();
        $model->country_id = $this->testCountry->id;
        $model->save();

        $model->refresh();
        $this->assertEquals($this->testCountry->id, $model->country_id);
        $this->assertEquals('Testland', $model->country->name);
    }

    public function testSetStateById()
    {
        $model = $this->createTestModel();
        $model->country_id = $this->testCountry->id;
        $model->state_id = $this->testState->id;
        $model->save();

        $model->refresh();
        $this->assertEquals('Test Province', $model->state->name);
    }

    //
    // Code-based accessors
    //

    public function testSetCountryCodeAttribute()
    {
        $model = $this->createTestModel();
        $model->country_code = 'tl';
        $model->save();

        $model->refresh();
        $this->assertNotNull($model->country_id);
        $this->assertEquals('Testland', $model->country->name);
    }

    public function testGetCountryCodeAttribute()
    {
        $model = $this->createTestModel();
        $model->country_id = $this->testCountry->id;
        $model->save();

        $model->refresh();
        $this->assertEquals('tl', $model->country_code);
    }

    public function testGetCountryCodeReturnsNullWithoutCountry()
    {
        $model = $this->createTestModel();
        $this->assertNull($model->country_code);
    }

    public function testSetStateCodeAttribute()
    {
        $model = $this->createTestModel();
        $model->country_id = $this->testCountry->id;
        $model->state_code = 'tp';
        $model->save();

        $model->refresh();
        $this->assertNotNull($model->state_id);
        $this->assertEquals('Test Province', $model->state->name);
    }

    public function testGetStateCodeAttribute()
    {
        $model = $this->createTestModel();
        $model->country_id = $this->testCountry->id;
        $model->state_id = $this->testState->id;
        $model->save();

        $model->refresh();
        $this->assertEquals('tp', $model->state_code);
    }

    public function testGetStateCodeReturnsNullWithoutState()
    {
        $model = $this->createTestModel();
        $this->assertNull($model->state_code);
    }

    public function testSetInvalidCountryCodeDoesNothing()
    {
        $model = $this->createTestModel();
        $model->country_code = 'nonexistent';
        $model->save();

        $model->refresh();
        $this->assertNull($model->country_id);
    }

    public function testSetInvalidStateCodeDoesNothing()
    {
        $model = $this->createTestModel();
        $model->state_code = 'nonexistent';
        $model->save();

        $model->refresh();
        $this->assertNull($model->state_id);
    }

    //
    // ID attribute setters
    //

    public function testSetCountryIdToZeroClearsIt()
    {
        $model = $this->createTestModel();
        $model->country_id = $this->testCountry->id;
        $model->save();

        $model->country_id = 0;
        $model->save();

        $model->refresh();
        $this->assertNull($model->country_id);
    }

    public function testSetStateIdToZeroClearsIt()
    {
        $model = $this->createTestModel();
        $model->state_id = $this->testState->id;
        $model->save();

        $model->state_id = 0;
        $model->save();

        $model->refresh();
        $this->assertNull($model->state_id);
    }

    public function testSetCountryIdToEmptyStringClearsIt()
    {
        $model = $this->createTestModel();
        $model->country_id = '';
        $model->save();

        $model->refresh();
        $this->assertNull($model->country_id);
    }

    //
    // Fillable
    //

    public function testTraitAddsFillableFields()
    {
        $model = new LocationModelTraitTestModel;
        $fillable = $model->getFillable();

        $this->assertContains('country_id', $fillable);
        $this->assertContains('state_id', $fillable);
        $this->assertContains('country_code', $fillable);
        $this->assertContains('state_code', $fillable);
    }

    //
    // Dropdown options
    //

    public function testGetCountryOptionsReturnsNameList()
    {
        $this->testCountry->is_enabled = true;
        $this->testCountry->save(['force' => true]);

        // Reset name list cache
        $ref = new ReflectionClass(Country::class);
        $prop = $ref->getProperty('nameList');
        $prop->setAccessible(true);
        $prop->setValue(null, null);

        $model = new LocationModelTraitTestModel;
        $options = $model->getCountryOptions();

        $this->assertNotEmpty($options);
        $this->assertContains('Testland', $options);
    }

    public function testGetStateOptionsReturnsStatesForCountry()
    {
        // Reset state name list cache
        $ref = new ReflectionClass(State::class);
        $prop = $ref->getProperty('nameList');
        $prop->setAccessible(true);
        $prop->setValue(null, []);

        $model = $this->createTestModel();
        $model->country_id = $this->testCountry->id;

        $options = $model->getStateOptions();

        $this->assertNotEmpty($options);
        $this->assertContains('Test Province', $options);
    }
}
