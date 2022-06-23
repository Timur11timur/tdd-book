<?php

require '../vendor/autoload.php';

use App\xUnit\TestCase;
use App\xUnit\WasRun;

class TestCaseTest extends TestCase {
    private $test;

    public function setUp(): void
    {
        $this->test = new WasRun('testMethod');
    }

    public function testRunning()
    {
        $this->test->run();
        assert($this->test->wasRun);
    }

    public function testSetUp()
    {
        $this->test->run();
        assert('setUp ' === $this->test->log);
    }
}

(new TestCaseTest('testRunning'))->run();
(new TestCaseTest('testSetUp'))->run();


