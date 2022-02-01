<?php

class Player
{
    private $avatar;
    private $player;
    private $placeOfBirth;
    private $birthdate;
    private $technicalTeam;
    private $weigth;
    private $heigth;
    private $position;
    private $dni;

    public function __construct(
        $avatar = "",
        $player = "",
        $placeOfBirth = "",
        $birthdate = "",
        $technicalTeam = "",
        $weigth = "",
        $heigth = "",
        $position = "",
        $dni = ""
    ) {
        $this->avatar = $avatar;
        $this->player = $player;
        $this->placeOfBirth = $placeOfBirth;
        $this->birthdate = $birthdate;
        $this->technicalTeam = $technicalTeam;
        $this->weigth = $weigth;
        $this->heigth = $heigth;
        $this->position = $position;
        $this->dni = $dni;
    }
    

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }


    /**
     * Get the value of placeOfBirth
     */ 
    public function getPlaceOfBirth()
    {
        return $this->placeOfBirth;
    }

    /**
     * Get the value of birthdate
     */ 
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Get the value of technicalTeam
     */ 
    public function getTechnicalTeam()
    {
        return $this->technicalTeam;
    }

    /**
     * Get the value of weigth
     */ 
    public function getWeigth()
    {
        return $this->weigth;
    }

    /**
     * Get the value of heigth
     */ 
    public function getHeigth()
    {
        return $this->heigth;
    }

    /**
     * Get the value of position
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Get the value of player
     */ 
    public function getPlayer()
    {
        return $this->player;
    }
}
