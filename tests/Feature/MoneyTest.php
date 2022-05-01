<?php

namespace Tests\Feature;

use App\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /** @test */
    public function multiplication()
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    /** @test */
    public function equality()
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertTrue((Money::franc(5))->equals(Money::franc(5)));
        $this->assertFalse((Money::franc(5))->equals(Money::franc(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    /** @test */
    public function francMultiplication()
    {
      $five = Money::franc(5);
      $this->assertEquals(Money::franc(10), $five->times(2));
      $this->assertEquals(Money::franc(15), $five->times(3));
    }
}