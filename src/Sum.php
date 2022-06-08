<?php

namespace App;

class Sum implements Expression
{
    private Money $augend;
    private Money $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->amount + $this->addend->amount;

        return new Money($amount, $to);
    }

    public function __get(string $name): mixed
    {
        if (isset($this->$name)) {
            return $this->$name;
        }

        return null;
    }
}
