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
        string $description
        ,
        string $country

    ): bool {
        try {
            $team = new Team(0, $this->input($name), $this->input($description), $this->input($country), null);

            $res = $this->con->insert(

                "teams",
                ["name" => $team->getName(), "description" => $team->getDescription(), "country" => $team->getCountry()]

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
                $team = new Team($r['id'], $r['name'], $r['country'], $r['description'], $r['created_at']);
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

            $res = $this->con->selectOne("teams", $id);

            $team = new Team($res['id'], $res['name'], $res['country'], $res['description'], $res['created_at']);

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
        string $description
        ,
        string $country
        ,
        int $id
    ) {
        try {
            $res = $this->con->update("teams", ["name" => $this->input($name), "description" => $this->input($description), "country" => $this->input($country)], $id);
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
