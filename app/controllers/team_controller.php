<?php

namespace MVC\Controllers;

use MVC\Models\Team;

class TeamController extends Team {

    protected $teamModel;

    public function __construct($name, $number, $coach) {
        parent::__construct($name, $number, $coach);
        $this->teamModel = new Team($name, $number, $coach);
    }

    public function index() {
        $teams = $this->teamModel->getAllTeams();
        // $this->render('Team/index', ['teams' => $teams]);
    }

    public function create() {
        // Handle form submission for creating a new team
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $number = $_POST['number'];
            $coach = $_POST['coach'];

            $team = new Team($name, $number, $coach);
            $team->addTeam();

            header('Location: /team');
            exit;
        }

        // $this->render('Team/create');
    }

    public function edit($id) {
   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'number' => $_POST['number'],
                'coach' => $_POST['coach'],
            ];

          
            $this->teamModel->updateTeam($data, $id);

           
            header('Location: /team');
            exit;
        }

        // Fetch the team data for editing
        $team = $this->teamModel->getTeamById($id);

        if (!$team) {
            // Handle the case where the team with the given ID doesn't exist
            // Redirect or show an error message
            echo "Team not found!";
            exit;
        }

        // Render the team editing form
        // $this->render('Team/edit', ['team' => $team]);
    }

    public function delete($id) {
        // Delete the team from the database
        $this->teamModel->deleteTeam($id);

        // Redirect to the team index page after deleting a team
        header('Location: /team');
        exit;
    }
}

