<?php

namespace App;

class Money implements Expression
{
    protected int $amount;

    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Money $object): bool
    {
        return ($this->amount == $object->amount) && ($this->currency == $object->currency);
    }

    static public function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    static public function franc(int $amount): Money
    {
      return new Money($amount, 'CHF');
    }

    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Money $addend): Expression
    {
        return new Money($this->amount + $addend->amount, $this->currency);
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
