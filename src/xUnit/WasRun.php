<?php

namespace App\xUnit;

class WasRun extends TestCase
{
    public bool $wasRun;

    public function __construct(string $name)
    {
        $this->wasRun = false;
        parent::__construct($name);
    }

    public function testMethod()
    {
        $this->wasRun = true;
    }

}
