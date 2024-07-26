<?php
declare(strict_types=1);

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    // use CreatesApplication;

    protected function initDatabase()
    {

        Artisan::call('db:wipe');
        Artisan::call('db:seed --class=TestSeeder');
    }

    protected function resetDatabase()
    {
        Artisan::call('migrate:reset');
    }
}