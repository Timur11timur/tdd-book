<?php

namespace App;

class Money implements Expression
{
    private int $amount;

    private string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function __get(string $name): ?int
    {
        if (isset($this->$name)) {
            return $this->$name;
        }

        return null;
    }

    static public function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    static public function franc(int $amount): Money
    {
        return new Money($amount, 'CHF');
    }

    public function equals(Money $object): bool
    {
        return ($this->amount == $object->amount) && ($this->currency == $object->currency);
    }

    public function times(int $multiplier): Expression
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Expression $addend): Expression
    {
        return new Sum($this, $addend);
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function reduce(Bank $bank, string $to): self
    {
        $rate = $bank->rate($this->currency, $to);

        return new Money($this->amount / $rate, $to);
    }
}
