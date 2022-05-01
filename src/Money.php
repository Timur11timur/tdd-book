<?php

namespace App;

abstract class Money
{
    protected int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function equals(Money $object): bool
    {
        return ($this->amount == $object->amount) && (get_class($this) == get_class($object));
    }

    static public function dollar(int $amount): Dollar
    {
        return new Dollar($amount);
    }

    static public function franc(int $amount): Franc
    {
      return new Franc($amount);
    }

    abstract public function times(int $multiplier): Money;
}
