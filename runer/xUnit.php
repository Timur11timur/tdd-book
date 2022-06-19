<?php

require '../vendor/autoload.php';

use App\xUnit\TestCase;
use App\xUnit\WasRun;

class TestCaseTest extends TestCase {
    public function testRunning()
    {
        $test = new WasRun('testMethod');
        assert(!$test->wasRun);
        $test->run();
        assert($test->wasRun);
    }
}

(new TestCaseTest('testRunning'))->run();


