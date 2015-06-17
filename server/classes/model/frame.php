<?php

namespace Model;
 
class Frame {
    
    private $pinsFirstThrow;
    private $pinsSecondThrow;
    private $pinsBonusThrow;
    
	// Instantiate class
	function __construct($pinsFirstThrow, $pinsSecondThrow=0, $pinsBonusThrow=0) {
        $this->pinsFirstThrow = $pinsFirstThrow;
        $this->pinsSecondThrow = $pinsSecondThrow;
        $this->pinsBonusThrow = $pinsBonusThrow;
	}
    
    // Are we a strike frame?
    public function strike()
    {
        return ($this->pinsFirstThrow == 10) ? true : false;
    }
    
    // Are we a spare frame?
    public function spare()
    {
        return ($this->pinsFirstThrow+$this->pinsSecondThrow == 10) ? true : false;
    }
    
    // Return our score
    public function score($throw='firstsecond')
    {
        $score = null;
        
        switch($throw)
        {
            case 'firstsecond':
                $score = $this->pinsFirstThrow + $this->pinsSecondThrow;
                break;
            case 'first':
                $score = $this->pinsFirstThrow;
                break;
            case 'second':
                $score = $this->pinsSecondThrow;
                break;
            case 'bonus':
                $score = $this->pinsBonusThrow;
                break;
        }
                
        return $score;
    }
    
}