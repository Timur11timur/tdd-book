<?php

namespace Tests\Feature;

use App\xUnit\TestResult;
use App\xUnit\TestSuite;
use App\xUnit\WasRun;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    private $test;
    private TestResult $result;

    public function setUp(): void
    {
        $this->result = new TestResult();
    }

    /** @test */
    public function test_template_method()
    {
        $this->test = new WasRun('testMethod');
        $this->test->run($this->result);
        $this->assertTrue('setUp testMethod tearDown ' === $this->test->log);
    }

    /** @test */
    public function test_result()
    {
        $this->test = new WasRun('testMethod');
        $this->test->run($this->result);
        $this->assertTrue('1 run, 0 failed' === $this->result->summary());
    }

    /** @test */
    public function test_failed_result()
    {
        $this->test = new WasRun('testBrokenMethod');
        $this->test->run($this->result);
        $this->assertTrue('1 run, 1 failed' === $this->result->summary());
    }

    /** @test */
    public function test_failed_result_formatting()
    {
        $this->result->testStarted();
        $this->result->testFailed();
        $this->assertTrue('1 run, 1 failed' === $this->result->summary());
    }

    /** @test */
    public function test_suit()
    {
        $suit = new TestSuite();
        $suit->add(new WasRun('testMethod'));
        $suit->add(new WasRun('testBrokenMethod'));
        $suit->run($this->result);
        $this->assertTrue('2 run, 1 failed' === $this->result->summary());
    }
}
