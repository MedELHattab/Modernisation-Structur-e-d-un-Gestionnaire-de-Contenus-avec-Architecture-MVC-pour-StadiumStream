<?php

namespace MVC\Models;

class Team {
    public string $name;
    public int $number;

    public string $coach;

    public function __construct($name, $number, $coach) {
        $this->name = $name;
        $this->number = $number;
        $this->coach = $coach;  
    }
}