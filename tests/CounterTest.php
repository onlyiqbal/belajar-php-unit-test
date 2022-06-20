<?php

namespace Iqbal\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
     private Counter $counter;

     protected function setUp(): void
     {
          $this->counter = new Counter();
          echo "Membuat Counter" . PHP_EOL;
     }

     public function testIncrement()
     {
          self::assertEquals(0, $this->counter->getCounter());
          echo "TEST TEST" . PHP_EOL;
          self::markTestIncomplete("TODO do counter again");
     }

     public function testCounter()
     {
          $this->counter->increment();
          $this->counter->increment();

          Assert::assertEquals(2, $this->counter->getCounter());
     }

     /**
      * @test
      */
     public function increment()
     {
          self::markTestSkipped("Masih ada error yang bingung");

          $this->counter->increment();
          $this->assertEquals(1, $this->counter->getCounter());
     }

     public function testFirst(): Counter
     {
          $this->counter->increment();
          $this->assertEquals(1, $this->counter->getCounter());

          return $this->counter;
     }

     /** 
      * @depends testFirst
      */

     public function testSecond(Counter $counter): void
     {
          $counter->increment();
          $this->assertEquals(2, $counter->getCounter());
     }

     protected function tearDown(): void
     {
          echo "Tear Down" . PHP_EOL;
     }

     /**
      * @after
      */
     public function after()
     {
          echo "After" . PHP_EOL;
     }

     /**
      * @requires OSFAMILY Windows
      */
     public function testOnlyWindows()
     {
          self::assertTrue(true, "Only in Windows");
     }

     /**
      * @requires PHP >= 8
      * @requires OSFAMILY Windows
      */
     public function testOnlyForWindowsAndPHP8()
     {
          self::assertTrue(true, "Only for Windows and PHP 8");
     }
}
