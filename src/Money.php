<?php

namespace App;

abstract class Money
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
        return ($this->amount == $object->amount) && (get_class($this) == get_class($object));
    }

    static public function dollar(int $amount): Dollar
    {
        return new Dollar($amount, 'USD');
    }

    static public function franc(int $amount): Franc
    {
      return new Franc($amount, 'CHF');
    }

    abstract public function times(int $multiplier): Money;

    public function currency(): string
    {
        return $this->currency;
    }
}
