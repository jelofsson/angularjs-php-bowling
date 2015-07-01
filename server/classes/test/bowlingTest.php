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
        for($i=0; $i<10; $i++) 
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
        for($i=0; $i<10; $i++) 
        {
            $g->add(10, 0);
        }
        // Add last frame
        $g->add(10, 10, 9);

        // Assert
        $this->assertEquals(299, $g->score());
    }
    
    public function testDoublePinfallGame()
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
    
    public function testTurkeyPinfallGame()
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

