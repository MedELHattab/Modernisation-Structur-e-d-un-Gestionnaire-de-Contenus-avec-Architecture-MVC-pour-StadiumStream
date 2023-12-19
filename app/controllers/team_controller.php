<?php

namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\Team;

class TeamController extends Controller {
    public function team() {
        $teams = [
            new Team('RCA', 30,'skitioui'),
            new Team('FCB', 30,'mourinho')
        ];

        $this->render('team', ['teams' => $teams]);
    }
}