<?php

require '../vendor/autoload.php';

use App\xUnit\TestCase;
use App\xUnit\TestResult;
use App\xUnit\TestSuite;
use App\xUnit\WasRun;

class TestCaseTest extends TestCase
{
    private $test;
    private TestResult $result;

    public function setUp(): void
    {
        $this->result = new TestResult();
    }

    public function testTemplateMethod()
    {
        $this->test = new WasRun('testMethod');
        $this->test->run($this->result);
        assert('setUp testMethod tearDown ' === $this->test->log);
    }

    public function testResult()
    {
        $this->test = new WasRun('testMethod');
        $this->test->run($this->result);
        assert('1 run, 0 failed' === $this->result->summary());
    }

    public function testFailedResult()
    {
        $this->test = new WasRun('testBrokenMethod');
        $this->test->run($this->result);
        assert('1 run, 1 failed' === $this->result->summary());
    }

    public function testFailedResultFormatting()
    {
        $this->result->testStarted();
        $this->result->testFailed();
        assert('1 run, 1 failed' === $this->result->summary());
    }

    public function testSuit()
    {
        $suit = new TestSuite();
        $suit->add(new WasRun('testMethod'));
        $suit->add(new WasRun('testBrokenMethod'));
        $suit->run($this->result);
        assert('2 run, 1 failed' === $this->result->summary());
    }
}

$suit = new TestSuite();
$suit->add(new TestCaseTest('testTemplateMethod'));
$suit->add(new TestCaseTest('testResult'));
$suit->add(new TestCaseTest('testFailedResult'));
$suit->add(new TestCaseTest('testFailedResultFormatting'));
$suit->add(new TestCaseTest('testSuit'));
$result = new TestResult();
$suit->run($result);

echo $result->summary();


