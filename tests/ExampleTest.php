<?php


class ExampleTest extends PHPUnit_Extensions_Selenium2TestCase
{
  public function setUp()
  {
      $this->setHost('localhost');
      $this->setPort(4444);
      $this->setBrowserUrl('http://localhost/blog/public/');
      $this->setBrowser('firefox');
  }
  public function testLogin()
  {
    $this->url('/login');
    $email =  $this->byName('email');
    $password =  $this->byName('password');

    $this->assertEquals('', $email->value('hawley@gmail.com'));
    $this->assertEquals('', $password->value('hawley'));
    $this->byName('login')->click();
  }
  public function secondTest()
  {
    $this->url('/show');
  }
}
