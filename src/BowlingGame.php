<?php

class BowlingGame
{
    /**
     * @var mixed $listScore
     */
    public $listScore;
    public int $totalScore = 0;

    public function __construct($listScore)
    {
        $this->listScore = str_split($listScore);//$listScore;
    }

    function check(): int
    {
        $listScore = $this->listScore;
        $length = count($this->listScore);
        for ($i = 0; $i < $length; $i++){
            if ($listScore[$i] == "X"){
                if ($i <= $length - 3){
                    $this->totalScore += 10 + (($listScore[$i + 1] == 'X') ? 10 : 0) + (($listScore[$i + 2] == 'X') ? 10 : 0);
                }else{
                    return $this->totalScore;
                }
            }
            elseif ($listScore[$i] == "/"){
                if ($i <= $length - 1){
                    $this->totalScore -= $listScore[$i - 1];
                    $this->totalScore += 10 + $listScore[$i + 1];
                }else{
                    return $this->totalScore;
                }
            }
            elseif ($i == $length - 1 && $listScore[$i - 1] == "/"){
                return $this->totalScore;
            }
            elseif ($listScore[$i] == "-"){
                $this->totalScore += 0;
            }
            else{
                $this->totalScore += $listScore[$i];
            }
        }
        return $this->totalScore;
    }

    private function charToNum($char): int
    {
        if ($char == 'X'){
            return 10;
        }
        return 0;
    }
}