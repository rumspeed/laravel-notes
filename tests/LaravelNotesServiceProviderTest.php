<?php

declare(strict_types=1);

namespace Rumspeed\LaravelNotes\Tests;

use Rumspeed\LaravelNotes\LaravelNotesServiceProvider;

/**
 * Class     LaravelNotesServiceProviderTest
 */
class LaravelNotesServiceProviderTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var \Rumspeed\LaravelNotes\LaravelNotesServiceProvider */
    protected $provider;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(LaravelNotesServiceProvider::class);
    }

    public function tearDown(): void
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    public function test_it_can_be_instantiated(): void
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Spatie\LaravelPackageTools\PackageServiceProvider::class,
            LaravelNotesServiceProvider::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->provider);
        }
    }
}
