<?php

namespace Tests;

use Carbon\CarbonImmutable;
use Exception;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    private Generator $faker;
    private CarbonImmutable $dateNow;

    public function setUp(): void {

        parent::setUp();
        $this->faker = Factory::create();
        $this->dateNow = CarbonImmutable::now();
    }

    public function __get($key) {

        if ($key === 'faker')
            return $this->faker;
        if ($key === 'dateNow')
            return $this->dateNow;
        throw new Exception('Unknown Key Requested');
    }
}
