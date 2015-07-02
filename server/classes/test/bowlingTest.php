<?php

// Bowling test
namespace Test;
use Model\Game;

class BowlingTest extends \PHPUnit_Framework_TestCase
{

    public function testPerfectGame()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        for($i=0; $i<9; $i++) 
        {
            $g->add(10, 0);
        }
        // Add last frame
        $g->add(10, 10, 10);

        // Assert
        $this->assertEquals(300, $g->score());
    }
    
    public function testHeartbreakGame()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        for($i=0; $i<9; $i++) 
        {
            $g->add(10, 0);
        }
        // Add last frame
        $g->add(10, 10, 9);

        // Assert
        $this->assertEquals(299, $g->score());
    }

    public function testTwoThrowsNoMark()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        $g->add(5, 4);

        // Assert
        $this->assertEquals(9, $g->score());
    }
    
    public function testFourThrowsNoMark()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        $g->add(5, 4);
        $g->add(7, 2);

        // Assert
        $this->assertEquals(18, $g->score());
    }
    
    public function testSimpleSpare()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        $g->add(3, 7);
        $g->add(3, 0);

        // Assert
        $this->assertEquals(13, $g->scoreForFrame(1));
    }
        
    public function testSimpleStrike()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        $g->add(10, 0);
        $g->add(3, 6);

        // Assert
        $this->assertEquals(19, $g->scoreForFrame(1));
        $this->assertEquals(28, $g->score());
    }
    
    
    public function testDoublePinfall()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        $g->add(10, 0);
        $g->add(10, 0);
        $g->add(9, 0);

        // Assert
        $this->assertEquals(57, $g->score());
    }
    
    public function testTurkeyPinfall()
    {
        // Create a new game object
        $g = new \Model\Game();

        // Add regular frames
        $g->add(10, 0);
        $g->add(10, 0);
        $g->add(10, 0);
        $g->add(0, 9);

        // Assert
        $this->assertEquals(78, $g->score());
    }

}

