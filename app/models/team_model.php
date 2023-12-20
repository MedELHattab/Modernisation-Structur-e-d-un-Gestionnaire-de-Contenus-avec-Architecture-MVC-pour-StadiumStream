<?php

namespace MVC\Models;

use Crud\Crud;

class Team extends Crud
{
    public string $name;
    public int $number;
    public string $coach;

    public function __construct($name, $number, $coach)
    {
        $this->name = $name;
        $this->number = $number;
        $this->coach = $coach;
    }

    public function addTeam()
    {
        $data = [
            'name' => $this->name,
            'number' => $this->number,
            'coach' => $this->coach,
        ];
        
        return $this->insertRecord($data);
    }

    public function deleteTeam($id)
    {
        // Implement the deleteTeam method using deleteRecord from the Crud class
        return $this->deleteRecord($id);
    }

    public function updateTeam($data, $id)
    {
        // Implement the updateTeam method using updateRecord from the Crud class
        return $this->updateRecord($data, $id);
    }

    public function getAllTeams()
    {
        // Implement the getAllTeams method using selectRecords from the Crud class
        return $this->selectRecords();
    }
}


