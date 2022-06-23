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

    public function run()
    {
        $this->setUp();
        $method = $this->name;
        $this->$method();
        $this->tearDown();
    }

    public function tearDown(): void
    {
    }
}
