<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseTransactions;

    public function testExample()
    {

      $this->visit('/register')
             ->type('hawley2','name')
             ->type('hawley2@gmail.com','email')
             ->type('hawley2','password')
             ->type('hawley2','password_confirmation')
             ->press('Register');
    }
}
