<?php

namespace App\xUnit;

class TestResult
{
    private int $runCount;

    public function __construct()
    {
        $this->runCount = 0;
    }

    public function testStarted(): void
    {
        $this->runCount += 1;
    }

    public function summary(): string
    {
        return $this->runCount . ' run, 0 failed';
    }
}
