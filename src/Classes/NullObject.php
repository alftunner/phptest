<?php

namespace App;

// Создаем интерфейс для реальных объектов и пустых объектов
interface Logger {
    public function log(string $message);
}

// Реализация реального объекта Logger
class FileLogger implements Logger {
    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function log(string $message) {
        file_put_contents($this->filename, $message, FILE_APPEND);
    }
}

// Реализация пустого объекта NullLogger
class NullLogger implements Logger {
    public function log(string $message) {
        // Ничего не делаем, просто игнорируем логирование
    }
}

// Пример использования

// Создаем реальный объект Logger
$logger = new FileLogger("app.log");

// Выводим сообщение в лог (реальный логгер)
$logger->log("Записываем сообщение в лог.");

// Создаем пустой объект Logger (NullLogger)
$nullLogger = new NullLogger();

// Выводим сообщение в "лог" (пустой логгер, ничего не происходит)
$nullLogger->log("Это не будет записано никуда.");
