<?php
trait MyTestDatabaseMigrations
{

  public function runDatabaseMigrations()
  {
      $this->artisan('migrate:refresh', ['--seeder' => 'TestDatabaseSeeder', '--database' => 'testing']);

      $this->beforeApplicationDestroyed(function () {
          $this->artisan('migrate:rollback');
      });
  }

}
class SeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
{

   protected $baseUrl = 'http://localhost/blog/public/';


  public function setUp()
  {
      $this->setBrowserUrl('http://localhost/blog/public/');
      $this->setBrowser('firefox');
  }


  public function testRegister()
  {
    $this->url('/register');
    $email =  $this->byName('email');
    $password =  $this->byName('password');
    $name =  $this->byName('name');
    $password_confirmation =  $this->byName('password_confirmation');

    $this->assertEquals('', $name->value('kamudia4'));
    $this->assertEquals('', $email->value('kamudia4@gmail.com'));
    $this->assertEquals('', $password->value('kamudia4'));
    $this->assertEquals('', $password_confirmation->value('kamudia4'));
    $this->byName('register')->click();
  }



  public function tearDown()
   {
       $this->stop();
   }

}
