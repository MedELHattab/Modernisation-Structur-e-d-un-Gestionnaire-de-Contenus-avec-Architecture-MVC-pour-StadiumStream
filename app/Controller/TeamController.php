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

        $this->render("dashboard", "team", "liste of teams", $result);

    }

    public function addteam()
    {                           
       
        $this->render("dashboard", "creat", "Add Team", null);

    }

    public function insertTeam()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $name = $_POST['Name'] ;

            $coach = $_POST['Coach'] ;

            $number = $_POST['Number']+0 ;

            $team = new TeamModel();
         
            $res = $team->addTeam($name, $number, $coach);


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
        $id+=0;
        $result = $team->oneTeam($id);
        $this->render("dashboard", "creat", "Edit Users",$result);
    }
 
    public function updateTeam(){
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $name = $_POST['Name'] ;

            $coach = $_POST['Coach'] ;

            $number = $_POST['Number'] +0 ;

            $id = $_POST['id']+0 ;

            $team = new TeamModel();
               

            $res = $team->updateTeam($name, $number, $coach,$id);
 
             
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