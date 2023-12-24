<?php

namespace App\Controller;

use App\Model\TeamModel;
use App\Controller\Controller;

class TeamController extends Controller
{

    public function index()
    {

        $teams = new TeamModel();

        $result = $teams->allTeams();

        $this->render("team", "listeTeam", "liste of teams", $result);

    }

    public function addteam()
    {                           
       
        $this->render("team", "create", "Add Users", null);

    }

    public function insertteam()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $name = $_POST['name'] ;

            $description = $_POST['description'] ;

            $country = $_POST['country'] ;

            $team = new TeamModel();

            $res = $team->addTeam($name, $description, $country);


            if ($res) {
                session_start();
                $_SESSION['message']="team added with succes";
                header('Location:../');
                exit;
            } else {

                echo "Failed to add user.";
            }
        } else {

            echo "Invalid request method.";
        }
    }

    public function edit(int $id){
        $team = new TeamModel();
        $result = $team->oneTeam($id);
        $this->render("team", "create", "Edit Users",$result);
    }
    public function updateteam(){
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $name = $_POST['name'] ;

            $description = $_POST['description'] ;

            $country = $_POST['country'] ;

            $id = $_POST['id']+0 ;

            $team = new TeamModel();
               

            $res = $team->updateTeam($name, $description, $country,$id);
 
             
            if ($res) {
                  session_start();
                  $_SESSION['message']="team updated with succes";
                header('Location:../');
                exit;
            } else {

                echo "Failed to add user.";
            }
        } else {

            echo "Invalid request method.";
        }
    }
    public function view($id){
        $team = new TeamModel();
        $result = $team->oneTeam($id);
        $this->render("team", "read", "Read User",$result);
    }
    public function destroy($id){
        $team =  new TeamModel();
        $res =  $team->deleteTeam($id);
        if($res){
            session_start();
            $_SESSION['message']="team deleted with succes";
              header("Location:../../");
        }else echo 'something is wrong';
    }

}