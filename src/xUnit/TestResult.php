<?php

namespace App\xUnit;

class TestResult
{
    private int $runCount;
    private int $errorCount;

    public function __construct()
    {
        $this->runCount = 0;
        $this->errorCount = 0;
    }

    public function testStarted(): void
    {
        $this->runCount += 1;
    }

    public function testFailed(): void
    {
        $this->errorCount += 1;
    }

    public function summary(): string
    {
        return $this->runCount . ' run, ' . $this->errorCount . ' failed';
    }
}
