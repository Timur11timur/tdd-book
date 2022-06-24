<?php

require '../vendor/autoload.php';

use App\xUnit\TestCase;
use App\xUnit\TestResult;
use App\xUnit\WasRun;

class TestCaseTest extends TestCase
{
    private $test;

    public function testTemplateMethod()
    {
        $this->test = new WasRun('testMethod');
        $this->test->run();
        assert('setUp testMethod tearDown ' === $this->test->log);
    }

    public function testResult()
    {
        $this->test = new WasRun('testMethod');
        $result = $this->test->run();
        assert('1 run, 0 failed' === $result->summary());
    }

    public function testFailedResult()
    {
        $this->test = new WasRun('testBrokenMethod');
        $result = $this->test->run();
        assert('1 run, 1 failed' === $result->summary());
    }

    public function testFailedResultFormatting()
    {
        $result = new TestResult();
        $result->testStarted();
        $result->testFailed();
        assert('1 run, 1 failed' === $result->summary());
    }
}

(new TestCaseTest('testTemplateMethod'))->run();
(new TestCaseTest('testResult'))->run();
(new TestCaseTest('testFailedResult'))->run();
(new TestCaseTest('testFailedResultFormatting'))->run();


