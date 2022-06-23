<?php

namespace Tests\Feature;

use App\xUnit\WasRun;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    private $test;

    /** @test */
    public function test_template_method()
    {
        $this->test = new WasRun('testMethod');
        $this->test->run();
        $this->assertTrue('setUp testMethod tearDown ' === $this->test->log);
    }
}
