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
                $arrayUsers[] = $this->getValuesPlayers($row);
            }
        }
        return $arrayUsers;
    }

    /**
     * Retrieves all data of a player the current player
     *
     * @return Player or null in case not found
     */
    public function getMyData()
    {
        $sentence = $this->dbConnect->myQuery("SELECT * FROM player WHERE dni = ?", [$_SESSION["dni"]]);
        if (!is_null($sentence) && $sentence->rowCount() > 0 ) {
            foreach ($sentence as $row) {
                return $this->getValuesPlayers($row);
            }
        }
        return null;
    }

    /**
     * Adds a new player to the data source
     *
     * @param [Player] $player
     * @return bool true is added successfully, false otherwise
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
                return $sentence->rowCount() > 0;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Retrieves all players that matches with the given name and dni
     *
     * @param [type] $name the first matches
     * @param [type] $dni the second matches
     * @return array from players
     */
    public function searchPlayers($name, $dni)
    {
        $arrayUsers = [];
        $sentence = $this->dbConnect->myQuery("SELECT * FROM player WHERE player like ? AND dni LIKE ? and technical_team != ?", ["%$name%", "%$dni%", 1]);
        if (!is_null($sentence) && $sentence->rowCount() > 0) {
            foreach ($sentence as $row) {
                $arrayUsers[] = $this->getValuesPlayers($row);
            }
        }
        return $arrayUsers;
    }
    /**
     * Retrieves all values from row from given player
     *
     * @param [Player] $row data
     * @return Player 
     */
    public function getValuesPlayers($row)
    {
        return new Player($row["avatar"], $row["player"], $row["place_birth"], $row["birthdate"], $row["technical_team"], $row["weigth"], $row["heigth"],  $row["position"], $row["dni"]);
    }
}
