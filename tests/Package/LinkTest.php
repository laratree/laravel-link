<?php

namespace Laratree\LaravelLink\Tests\Package;

use Laratree\LaravelLink\Tests\SetUp\Models\Manufacturer;
use Laratree\LaravelLink\Tests\TestCase;

class LinkTest extends TestCase
{
    public function test_can_create_model_for_tests()
    {
        $this->withoutExceptionHandling();

        $manufacturer = Manufacturer::create([
            'name' => 'Lacoustics',
        ]);

        $manufacturer->link()->create([
            'url' => 'https://www.lacoustics.com',
        ]);

        $this->assertDatabaseCount('manufacturers', 1);
        $this->assertDatabaseHas('manufacturers', [
            'name' => 'Lacoustics',
        ]);
        $this->assertDatabaseCount('links', 1);
        $this->assertDatabaseHas('links', [
            'url' => 'https://www.lacoustics.com',
        ]);
    }

    public function test_can_attach_link_to_model()
    {
        $manufacturer = $this->createManufacturer();
        $manufacturer->attachLink($url = 'test.com');

        $this->assertDatabaseCount('links', 1);
        $this->assertDatabaseHas('links', [
            'url' => 'test.com',
        ]);

        $this->assertTrue($manufacturer->hasLink('test.com'));
    }

    public function test_get_link_from_relation()
    {
        $manufacturer = $this->createManufacturer();
        $manufacturer = Manufacturer::query()->with('link')->first();

        $this->assertEmpty($manufacturer->link()->get());

        $manufacturer->attachLink('test.com');
        $this->assertNotEmpty($manufacturer->link()->get());
    }

    //    function test_manufacturer_has_link_value()
    //    {
    //        //
    //    }

    public function test_manufacturer_delete_link()
    {
        $manufacturer = $this->createManufacturer();
        $manufacturer->attachLink('test.com');

        $this->assertDatabaseCount('manufacturers', 1);
        $this->assertDatabaseCount('links', 1);

        $manufacturer->deleteLink('test.com');
        $this->assertDatabaseCount('manufacturers', 1);
        $this->assertDatabaseCount('links', 0);
    }

    public function createManufacturer()
    {
        return Manufacturer::query()->create(['name' => 'Electro Voice']);
    }
}
