<?php

namespace Tests\Feature;

use App\xUnit\WasRun;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    private $test;

    public function setUp(): void
    {
        $this->test = new WasRun('testMethod');
    }

    /** @test */
    public function test_can_be_run()
    {
        $this->test->run();
        $this->assertTrue($this->test->wasRun);
    }

    /** @test */
    public function test_set_up()
    {
        $this->test->run();
        $this->assertTrue('setUp ' === $this->test->log);
    }
}
