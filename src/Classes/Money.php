<?php

namespace App;

class Money implements Expression
{
    public function __construct(protected int $amount, protected string $currency)
    {
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
    public function equals(object $object) : bool
    {
        if ($object instanceof Money) {
            return $this->amount == $object->amount && $this->currency() == $object->currency;
        }
        return false;
    }
    public function times(int $multiplier) : Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }
    public function currency(): string
    {
        return $this->currency;
    }
    public function plus(Money $addend) : Expression
    {
        return new Sum($this, $addend);
    }
    public function reduce(string $to) : Money
    {
        return $this;
    }
    static function dollar(int $amount) : Money
    {
        return new Money($amount, 'USD');
    }
    static function franc(int $amount) : Money
    {
        return new Money($amount, 'CHF');
    }


}