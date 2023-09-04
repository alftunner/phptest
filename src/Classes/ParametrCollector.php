<?php

namespace App;

class ParameterCollector {
    private $parameters = [];

    public function addParameter($name, $value) {
        $this->parameters[$name] = $value;
    }

    public function getParameters() {
        return $this->parameters;
    }
}

// Пример использования

$collector = new ParameterCollector();

$collector->addParameter("param1", "value1");
$collector->addParameter("param2", "value2");
$collector->addParameter("param3", "value3");

$parameters = $collector->getParameters();

// Теперь $parameters содержит массив параметров
print_r($parameters);
