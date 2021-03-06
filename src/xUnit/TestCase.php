<?php

namespace App\xUnit;

abstract class TestCase
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setUp(): void
    {
    }

    public function run(TestResult $result): void
    {
        $result->testStarted();
        $this->setUp();
        try {
            $method = $this->name;
            $this->$method();
        } catch(\Exception $e) {
            $result->testFailed();
        }
        $this->tearDown();
    }

    public function tearDown(): void
    {
    }
}
