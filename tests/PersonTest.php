<?php

namespace Iqbal\Test;

use Exception;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeCoverage\Report\PHP;

class PersonTest extends TestCase
{
     private Person $person;

     protected function setUp(): void
     {
     }

     /**
      * @before
      */
     public function createPerson()
     {
          $this->person = new Person("Iqbal");
     }

     public function testSuccess()
     {
          self::assertEquals("Hello Budi,my name is Iqbal", $this->person->sayHello("Budi"));
     }

     public function testException()
     {
          $this->expectException(Exception::class);
          $this->person->sayHello(null);
     }

     public function testGoodByeSuccess()
     {
          $this->expectOutputString("Good bye Budi" . PHP_EOL);
          $this->person->sayGoodBye("Budi");
     }
}
