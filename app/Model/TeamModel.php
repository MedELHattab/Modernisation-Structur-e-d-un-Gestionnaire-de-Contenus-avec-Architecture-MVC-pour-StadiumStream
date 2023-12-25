<?php
namespace App\Model;

use App\Crud\Crud;
use \PDOException;
use App\Classes\Team;

class TeamModel
{
    private $teams = [];
    private $con;
    public function __construct()
    {
        $this->con = new Crud();
    }

    public function addTeam(
        string $name
        ,
        int $number
        ,
        string $coach

    ): bool {
        try {
            $team = new Team(0, $this->input($name), $this->input($coach), $this->input($number));
           
          

            $res = $this->con->insert(

                "teams",
                ["Name" => $team->getName(), "Number" => $team->getNumber(), "Coach" => $team->getCoach()]

            );

            return $res;
        } catch (PDOException $e) {

            echo "Error adding Team: " . $e->getMessage();

            return false;

        }
    }


    public function allTeams()
    {
        try {

            $res = $this->con->selectAll("teams");

            foreach ($res as $r) {
                $team = new Team($r['id'], $r['Name'], $r['Coach'], $r['Number']);
                array_push($this->teams, $team);
            }
            return $this->teams;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function oneTeam(int $id)
    {
        try {
                 $id+=0;
            $res = $this->con->selectOne("teams", $id);

            $team = new Team($res['id'], $res['Name'], $res['Coach'], $res['Number']);

            return $team;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteTeam($id)
    {
        try {


            $r = $this->con->delete("teams", $id);

            return $r;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateTeam(
        string $name
        ,
        int $number
        ,
        string $coach
        ,
        int $id
    ) {
        try {
            $res = $this->con->update("teams", ["Name" => $this->input($name), "Number" => $this->input($number), "Coach" => $this->input($coach)], $id);
            return $res;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}
