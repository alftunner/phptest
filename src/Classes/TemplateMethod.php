<?php

namespace App;

// Абстрактный класс, представляющий шаблонный метод
abstract class AbstractClass {
    // Шаблонный метод, определяющий скелет алгоритма
    public function templateMethod() {
        $this->step1();
        $this->step2();
        $this->step3();
    }

    // Абстрактные методы, которые должны быть реализованы в дочерних классах
    abstract protected function step1();
    abstract protected function step2();
    abstract protected function step3();
}

// Конкретный класс, наследующий абстрактный класс и реализующий абстрактные методы
class ConcreteClass extends AbstractClass {
    protected function step1() {
        echo "Шаг 1 выполнен\n";
    }

    protected function step2() {
        echo "Шаг 2 выполнен\n";
    }

    protected function step3() {
        echo "Шаг 3 выполнен\n";
    }
}

// Пример использования

$object = new ConcreteClass();
$object->templateMethod();
