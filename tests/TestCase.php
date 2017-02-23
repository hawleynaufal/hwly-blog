<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */

    /*public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }*/
    public function createApplication()
 {
     $app = require __DIR__ . '/../bootstrap/app.php';

     Dotenv::load(__DIR__ . '/../', '.env.testing');

     $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

     $this->faker = Faker\Factory::create();

     $this->baseUrl = 'http://' . env('APP_URL', $this->baseUrl);

     return $app;
 }
}
