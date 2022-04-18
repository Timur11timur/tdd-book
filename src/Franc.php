<?php

namespace App;

class Franc
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier): Franc
    {
      return new Franc($this->amount * $multiplier);
    }

    public function equals(Franc $object): bool
    {
        return $this->amount == $object->amount;
    }
}
