<?php

namespace Tests\Feature;

use App\Dollar;
use App\Franc;
use PHPUnit\Framework\TestCase;

class DollarTest extends TestCase
{
    /** @test */
    public function multiplication()
    {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    /** @test */
    public function equality()
    {
        $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
        $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    }

    /** @test */
    public function francMultiplication()
    {
      $five = new Franc(5);
      $this->assertEquals(new Franc(10), $five->times(2));
      $this->assertEquals(new Franc(15), $five->times(3));
    }
}
