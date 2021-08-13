<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    public $score ='';
    public function getScore($player1Name, $player2Name, $player_score1, $player_score2)
    {

        $isDraw = $player_score1 == $player_score2;
        if ($isDraw) return $this-> getGameDrawCalledScore($player_score1);
        $isEnd = $player_score1 >= 4 || $player_score2 >= 4;
        if ($isEnd) return $this->getGameEndCalledScore($player_score1, $player_score2);
        $calledScore = $this->getPlayerCalledScore($player_score1)
            .
            "-"
            .
            $this->getPlayerCalledScore($player_score2);
        return $calledScore;
    }
        public function getGameDrawCalledScore ($drawScore){
        switch ($drawScore) {
            case 0:
                return $this->score="Love-All";
                break;
            case 1:
                return $this->score="Fifteen-All";
                break;
            case 2:
                return $this->score="Thirty-All";
                break;
            case 3:
                return $this->score="Forty-All";
                break;
            default:
                return $this->score="Deuce";
                break;

        }
    }
            public function getGameEndCalledScore($player_score1, $player_score2)
            {
                $minusResult = $player_score1 - $player_score2;
                if ($minusResult == 1) return $this->score="Advantage player1";
                if ($minusResult == -1) return $this->score="Advantage player2";
                if ($minusResult >= 2) return $this->score="Win for player1";
                return $this->score="Win for player2";
            }

        public function getPlayerCalledScore($tempScore)
        {
            switch ($tempScore) {
                case 0:
                    return $this->score="Love";
                    break;
                case 1:
                    return $this->score="Fifteen";
                    break;
                case 2:
                    return $this->score="Thirty";
                    break;
                case 3:
                    return $this->score="Forty";
                    break;
            }
        }



    public function __toString()
    {
        return $this->score;
    }
}