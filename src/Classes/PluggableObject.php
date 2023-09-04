<?php

namespace App;

// Основной класс, который может быть расширен с помощью плагинов
class PluggableObject {
    private $plugins = [];

    // Метод для добавления плагинов
    public function addPlugin(PluginInterface $plugin) {
        $this->plugins[] = $plugin;
    }

    // Метод, который использует плагины
    public function doSomething() {
        echo "Выполняем базовое действие\n";

        // Вызываем методы плагинов
        foreach ($this->plugins as $plugin) {
            $plugin->doSomething();
        }
    }
}

// Интерфейс для плагинов
interface PluginInterface {
    public function doSomething();
}

// Реализации плагинов
class Plugin1 implements PluginInterface {
    public function doSomething() {
        echo "Выполняем действие из Plugin1\n";
    }
}

class Plugin2 implements PluginInterface {
    public function doSomething() {
        echo "Выполняем действие из Plugin2\n";
    }
}

// Пример использования

$mainObject = new PluggableObject();
$mainObject->addPlugin(new Plugin1());
$mainObject->addPlugin(new Plugin2());

$mainObject->doSomething();
