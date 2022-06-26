<?php

namespace App\xUnit;

class TestSuite
{
    private array $tests;

    public function __construct()
    {
        $this->tests = [];
    }

    public function add($test): void
    {
        $this->tests[] = $test;
    }

    public function run(TestResult $result): void
    {
        foreach ($this->tests as $test) {
            $test->run($result);
        }
    }
}
