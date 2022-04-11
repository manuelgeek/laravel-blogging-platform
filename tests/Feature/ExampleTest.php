<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->prepareForTests();
    }

    private function prepareForTests()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

}
