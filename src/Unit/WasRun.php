<?php

namespace App\Unit;

class WasRun
{
    public bool $wasRun;
    public $pass;

    public function __construct(string $name)
    {
        $this->wasRun = false;
    }

    public function run()
    {
        $this->testMethod();
    }

    public function testMethod()
    {
        $this->wasRun = true;
    }

}
