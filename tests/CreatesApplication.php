<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication(): \Illuminate\Foundation\Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->prepareForTests();
    }

    private function prepareForTests(): void
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
