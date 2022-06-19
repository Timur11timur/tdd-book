<?php

namespace Tests\Feature;

use App\xUnit\WasRun;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    /** @test */
    public function test_can_be_run()
    {
        $test = new WasRun('testMethod');
        $this->assertFalse($test->wasRun);
        $test->run();
        $this->assertTrue($test->wasRun);
    }
}
