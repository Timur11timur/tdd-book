<?php

namespace App\xUnit;

abstract class TestCase
{
    protected bool $pass;
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function run()
    {
        $method = $this->name;
        $this->$method();
    }
}
