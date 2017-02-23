

<?php


class ExampleTest extends PHPUnit_Extensions_Selenium2TestCase
{
  public function setUp()
  {

      $this->setBrowserUrl('http://www.facebook.com');
      $this->setBrowser('firefox');
  }
  public function testLogin()
  {
    $this->url('/');
    $email =  $this->byName('email');
    $password =  $this->byName('pass');

    $this->assertEquals('', $email->value('hawleynaufal@gmail.com'));
    $this->assertEquals('', $password->value(''));
    $this->byValueName('Masuk')->click();
  }
}
