<?php

namespace Model;
use Model\Frame;

class Game {
    
    private $frames = array();
    
    // Add one frame to our array, with the values passed in argument
    public function add($pinsFirstThrow, $pinsSecondThrow=0, $pinsBonusThrow=0)
    {
        $f = new \Model\Frame($pinsFirstThrow, $pinsSecondThrow, $pinsBonusThrow);
        $this->frames[] = $f;
    }
    
    public function score()
    {   
        // Return the final score of our frames
        return $this->scoreForFrame($this->numberOfFrames());
    }
    
    public function scoreForFrame($theFrame)
    {
        $finalScore = 0;
        
        // Calculate our score
        for($i=0; $i<$theFrame; $i++)
        {
            // Add score from frame
            $finalScore += $this->frames[$i]->score();
            
            if(!$this->isFinalFrame($i) && $this->frames[$i]->strike())
            {
                // Add strike score
                $finalScore += $this->scoreNextTwoThrows($i);
            }
            else if(!$this->isFinalFrame($i) && $this->frames[$i]->spare())
            {
                // Add spare score
                $finalScore += $this->scoreNextThrow($i);
            }
            else if($this->isFinalFrame($i) && $this->frames[$i]->spare() || $this->frames[$i]->strike())
            {
                // Add final-frame bonus score
                $finalScore += $this->frames[$i]->score('bonus');
            }
        }
        
        return $finalScore;
    }
    
    public function numberOfFrames()
    {
        return count($this->frames);
    }
    
    function scoreNextTwoThrows($index)
    {
        if(isset($this->frames[$index+1]) && !$this->frames[$index+1]->strike())
        {
            return $this->frames[$index+1]->score();
        }
        else if(isset($this->frames[$index+1]))
        {
            return $this->frames[$index+1]->score() + $this->scoreNextThrow($index+1);
        }
    }

    function scoreNextThrow($index)
    {
        return isset($this->frames[$index+1]) ? $this->frames[$index+1]->score('first') : null;
    }
    
    function isFinalFrame($index)
    {
        // Last frame should have index of 9
        return ($index==9) ? true : false;
    }
    
}