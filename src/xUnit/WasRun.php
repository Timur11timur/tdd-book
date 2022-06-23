<?php

namespace App\xUnit;

class WasRun extends TestCase
{
    public string $log;

    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function setUp(): void
    {
        $this->log = 'setUp ';
    }

    public function testMethod()
    {
        $this->log .= 'testMethod ';
    }

    public function testBrokenMethod()
    {
        throw new \Exception();
    }

    public function tearDown(): void
    {
        $this->log .= 'tearDown ';
    }
}
