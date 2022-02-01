<?php
require_once "model/persist/DBConnect.php";
class PlayerDao
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    /**
     * Retrieves all players from data source
     *
     * @return array or empty in case not found
     */
    public function listAll()
    {
        $arrayUsers = [];
        $sentence = $this->dbConnect->myQuery("SELECT * FROM  player", []);
        if (!is_null($sentence) && $sentence->rowCount() > 0) {
            foreach ($sentence as $row) {
                $arrayUsers[] = new Player($row["avatar"], $row["player"], $row["place_birth"], $row["birthdate"], $row["technical_team"], $row["weigth"], $row["heigth"], $row["dni"]);
            }
        }
        return $arrayUsers;
    }
    /**
     * Retrieves all data of a player from data source
     *
     * @return Player or null in case not found
     */
    public function getMyData()
    {
        $sentence = $this->dbConnect->myQuery("SELECT * FROM player WHERE dni = ?", [$_SESSION["dni"]]);
        if (!is_null($sentence) && $sentence->rowCount() > 0) {
            foreach ($sentence as $row) {
                return new Player($row["avatar"], $row["player"], $row["place_birth"], $row["birthdate"], $row["technical_team"], $row["weigth"], $row["heigth"], $row["dni"]);
            }
        }
        return null;
    }

    /**
     * Checks if a email already exists in data source
     *
     * @param [Player] $player
     * @return bool true is exists or false if not
     */
    public function addPlayer($player)
    {
        try {
            if (!is_null($player)) {
                $sentence = $this->dbConnect->myQuery(
                    "INSERT INTO player VALUES (null,?,?,?,?,?,?,?,?,?)",
                    [
                        $player->getAvatar(), $player->getPlayer(), $player->getPlaceOfBirth(),
                        $player->getBirthdate(), $player->getTechnicalTeam(), $player->getWeigth(),
                        $player->getHeigth(), $player->getPosition(), $player->getDni()
                    ]
                );
                if ($sentence->rowCount() > 0) {
                    return true;
                }
            }
        } catch (Exception $ex) {
            return false;
        }
    }
}
