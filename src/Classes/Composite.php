<?php

namespace App;

// Общий интерфейс для всех компонентов
interface Component {
    public function operation();
}

// Конкретный компонент
class Leaf implements Component {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function operation() {
        echo "Leaf '{$this->name}' работает\n";
    }
}

// Компоновщик, который может содержать другие компоненты
class Composite implements Component {
    private $children = [];

    public function add(Component $component) {
        $this->children[] = $component;
    }

    public function operation() {
        echo "Composite работает\n";
        foreach ($this->children as $child) {
            $child->operation();
        }
    }
}

// Пример использования

$leaf1 = new Leaf("Лист 1");
$leaf2 = new Leaf("Лист 2");
$leaf3 = new Leaf("Лист 3");

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);

$composite2 = new Composite();
$composite2->add($leaf3);

$composite->add($composite2);

$composite->operation();
