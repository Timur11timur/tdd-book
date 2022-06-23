<?php

namespace App\xUnit;

class WasRun extends TestCase
{
    public bool $wasRun;
    public string $log;

    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function setUp(): void
    {
        $this->wasRun = false;
        $this->log = 'setUp ';
    }

    public function testMethod()
    {
        $this->wasRun = true;
    }
}
