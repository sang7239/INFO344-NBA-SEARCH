<?php
class Player{
    public $name = "";
    public $lname = "";
    public $fname = "";
    public $team = "";
    public $gp = 0.0;
    public $ppg = 0.0;
    public $m3pt = 0.0;
    public $reb = 0.0;
    public $ast = 0.0;

    public function getTeam() {
        return "Team: " . $this -> team;
    }
    public function getGp() {
        return "Games Played: " . $this -> gp;
    }
    public function getPpg() {
        return "Points Per Game: " . $this -> ppg;
    }
    public function getM3pt() {
        return "3 Points Made Per Game: " . $this -> m3pt;
    }
    public function getReb() {
        return "Number of Rebounds Made Per Game: " . $this -> reb;
    }
    public function getAst() {
        return "Number of Assists Made Per Game: " . $this -> ast;
    }
    public function getImg() {
        return "http://nba-players.herokuapp.com/players/" . $this -> lname . "/" . $this -> fname;
    }
}

?>