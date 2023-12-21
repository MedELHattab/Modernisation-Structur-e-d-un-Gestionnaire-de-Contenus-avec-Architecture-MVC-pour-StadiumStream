<?php

namespace MVC\Models;

use Crud\Crud;

class Team extends Crud
{
    private $name;
    private $number;
    private $coach;

    public function __construct($name, $number, $coach)
    {
        parent::__construct('teams'); 
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
        
        return $this->deleteRecord($id);
    }

    public function updateTeam($data, $id)
    {
        $data = [
            'name' => $this->name,
            'number' => $this->number,
            'coach' => $this->coach,
        ];
        return $this->updateRecord($data, $id);
    }

    public function getAllTeams()
    {
      
        return $this->selectRecords();
    }
}