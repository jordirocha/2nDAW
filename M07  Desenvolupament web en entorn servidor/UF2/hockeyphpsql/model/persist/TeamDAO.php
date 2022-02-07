<?php
require_once "model/persist/DBConnect.php";
require_once "model/Team.php";
class TeamDao
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect("model/files/classificacio.csv");
    }

    /**
     * Retrieves all teams from data source
     *
     * @return array or empty if no data found
     */
    public function listAll()
    {
        $arrayUsers = [];
        $sentence = [];
        $sentence = $this->dbConnect->myQuery("SELECT * FROM classification", []);
        if (!is_null($sentence) && $sentence->rowCount() > 0){
            foreach ($sentence as $row) {
                $arrayUsers[] = new Team(
                    $row["position"],
                    $row["team"],
                    $row["points"],
                    $row["matches"],
                    $row["wins"],
                    $row["losses"],
                    $row["draws"],
                    $row["gols_for"],
                    $row["gols_against"],
                    $row["goal_difference"]
                );
            }
        }
        return $arrayUsers;
    }

}
