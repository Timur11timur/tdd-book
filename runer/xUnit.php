<?php

require '../vendor/autoload.php';

use App\xUnit\TestCase;
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
}

(new TestCaseTest('testTemplateMethod'))->run();


