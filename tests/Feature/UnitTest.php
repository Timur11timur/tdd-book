<?php

namespace Tests\Feature;

use App\xUnit\TestResult;
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

    /** @test */
    public function test_result()
    {
        $this->test = new WasRun('testMethod');
        $result = $this->test->run();
        $this->assertTrue('1 run, 0 failed' === $result->summary());
    }

    /** @test */
    public function test_failed_result()
    {
        $this->test = new WasRun('testBrokenMethod');
        $result = $this->test->run();
        $this->assertTrue('1 run, 1 failed' === $result->summary());
    }

    /** @test */
    public function test_failed_result_formatting()
    {
        $result = new TestResult();
        $result->testStarted();
        $result->testFailed();
        $this->assertTrue('1 run, 1 failed' === $result->summary());
    }
}
