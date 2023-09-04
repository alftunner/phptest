<?php

namespace App;

class Sum implements Expression
{
    public $augend;
    public $addend;

    /**
     * @param $augend
     * @param $addend
     */
    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }
    public function reduce($to) : Money
    {
        $amount = $this->augend->getAmount() + $this->addend->getAmount();
        return new Money($amount, $to);
    }

}