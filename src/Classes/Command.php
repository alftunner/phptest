<?php

namespace App;

// 1. Создаем интерфейс команды
interface Command {
    public function execute();
}

// 2. Создаем конкретные классы команд, которые реализуют интерфейс Command

class Light {
    public function on() {
        echo "Свет включен\n";
    }

    public function off() {
        echo "Свет выключен\n";
    }
}

class LightOnCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->on();
    }
}

class LightOffCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->off();
    }
}

// 3. Создаем объекты, представляющие вызывающие и получатели команд

$light = new Light();
$lightOnCommand = new LightOnCommand($light);
$lightOffCommand = new LightOffCommand($light);

// 4. Создаем объекты, представляющие вызывающие (Invoker)

class RemoteControl {
    private $command;

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function pressButton() {
        $this->command->execute();
    }
}

// 5. Используем Invoker для выполнения команд

$remote = new RemoteControl();
$remote->setCommand($lightOnCommand); // Устанавливаем команду включения света
$remote->pressButton(); // Включаем свет

$remote->setCommand($lightOffCommand); // Устанавливаем команду выключения света
$remote->pressButton(); // Выключаем свет
