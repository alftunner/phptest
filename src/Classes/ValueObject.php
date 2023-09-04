<?php

namespace App;

class Money {
    private $amount;
    private $currency;

    public function __construct(float $amount, string $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getCurrency(): string {
        return $this->currency;
    }

    public function add(Money $money): Money {
        if ($this->currency !== $money->getCurrency()) {
            throw new InvalidArgumentException("Cannot add money in different currencies.");
        }

        return new Money($this->amount + $money->getAmount(), $this->currency);
    }

    public function subtract(Money $money): Money {
        if ($this->currency !== $money->getCurrency()) {
            throw new InvalidArgumentException("Cannot subtract money in different currencies.");
        }

        return new Money($this->amount - $money->getAmount(), $this->currency);
    }

    public function isEqualTo(Money $money): bool {
        return $this->currency === $money->getCurrency() && $this->amount === $money->getAmount();
    }
}

// Пример использования:

$money1 = new Money(100.0, "USD");
$money2 = new Money(50.0, "USD");

$result = $money1->add($money2);
echo "Сумма: {$result->getAmount()} {$result->getCurrency()}\n";

$result = $money1->subtract($money2);
echo "Разница: {$result->getAmount()} {$result->getCurrency()}\n";

if ($money1->isEqualTo($money2)) {
    echo "Суммы равны.\n";
} else {
    echo "Суммы не равны.\n";
}
