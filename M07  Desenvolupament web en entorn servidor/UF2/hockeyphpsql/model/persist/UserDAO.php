<?php
require_once "model/persist/DBConnect.php";
class UserDao
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect("model/files/usuaris.csv");
    }
    /**
     * Retrives all users from data source
     *
     * @return User or empty if no data found
     */
    public function checkLogin($email, $password)
    {
        $sentence = $this->dbConnect->myQuery("SELECT * FROM user WHERE email = ? && password = ?", [$email, $password]);

        if (!is_null($sentence) && $sentence->rowCount() > 0) {
            foreach ($sentence as $row) {
                return new User($row["email"], $row["password"], $row["role"], $row["address"], $row["dni"]);
            }
        }

        return null;
    }
    /**
     * Adds an user to data source
     *
     * @param [User] $user to add
     * @return bool true if is added or false
     */
    public function addUser($user)
    {
        try {
            if (!is_null($user)) {
                $sentence = $this->dbConnect->myQuery(
                    "INSERT INTO user VALUES (null,?,?,?,?,?)",
                    [$user->getEmail(), $user->getPassword(), $user->getRole(), $user->getAddress(), $user->getDni()]
                );
                return $sentence->rowCount() > 0;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Retrives my data from data source
     *
     * @return User or empty if no data found
     */
    public function getMyData()
    {
        $sentence = $this->dbConnect->myQuery("SELECT * FROM user WHERE dni = ?", [$_SESSION["dni"]]);

        if (!is_null($sentence) && $sentence->rowCount() > 0) {
            foreach ($sentence as $row) {
                return new User($row["email"], $row["password"], $row["role"], $row["address"], $row["dni"]);
            }
        }

        return null;
    }

    /**
     * Updates the information about the current user
     *
     * @param [User] $user
     * @return bool true if is updated or false
     */
    public function updateMyData($email, $address)
    {
        try {
            $sentence = $this->dbConnect->myQuery("UPDATE user SET address = ?, password = ? WHERE dni = ?", [$email, $address, $_SESSION["dni"]]);
            return ($sentence->rowCount() > 0);
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Deletes a player from the database
     *
     * @param [type] $dni to select the player
     * @return bool true if is deleted or false
     */
    public function deletePlayer($dni)
    {
        try {
            $sentence = $this->dbConnect->myQuery("DELETE from user WHERE dni = ?", [$dni]);
            return ($sentence->rowCount() > 0);
        } catch (Exception $ex) {
            return false;
        }
    }
}
