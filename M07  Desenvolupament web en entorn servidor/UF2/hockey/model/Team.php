<?php

class Team
{
    private $position;
    private  $team;
    private  $points;
    private   $matches;
    private   $wins;
    private   $losses;
    private   $draws;
    private   $golsFor;
    private   $golsAgainst;
    private   $goalDifference;

    public function __construct(
        $position,
        $team,
        $points = "",
        $matches = "",
        $wins = "",
        $draws = "",
        $losses = "",
        $golsFor = "",
        $golsAgainst = "",
        $goalDifference = ""
    ) {
        $this->position = $position;
        $this->team = $team;
        $this->points = $points;
        $this->matches = $matches;
        $this->wins = $wins;
        $this->draws = $draws;
        $this->losses = $losses;
        $this->golsFor = $golsFor;
        $this->golsAgainst = $golsAgainst;
        $this->goalDifference = $goalDifference;
    }

    /**
     * Get the value of position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get the value of team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Get the value of points
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Get the value of matches
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Get the value of wins
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Get the value of losses
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * Get the value of draws
     */
    public function getDraws()
    {
        return $this->draws;
    }

    /**
     * Get the value of golsFor
     */
    public function getGolsFor()
    {
        return $this->golsFor;
    }

    /**
     * Get the value of golsAgainst
     */
    public function getGolsAgainst()
    {
        return $this->golsAgainst;
    }

    /**
     * Get the value of goalDifference
     */
    public function getGoalDifference()
    {
        return $this->goalDifference;
    }
}
