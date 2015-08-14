<?php

// Bowling test
namespace Test;
use Model\Game;

class BowlingTest extends \PHPUnit_Framework_TestCase
{

    public function testPerfectGame()
    {
        // Arrange
        $g = new \Model\Game();
        for($i=0; $i<9; $i++) 
        {
            $g->add(10, 0);
        }
        $g->add(10, 10, 10);
        
        $expected = 300;

        // Act
        $actual = $g->score();

        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    public function testHeartbreakGame()
    {
        // Arrange
        $g = new \Model\Game();
        for($i=0; $i<9; $i++) 
        {
            $g->add(10, 0);
        }
        $g->add(10, 10, 9);
        
        $expected = 299;
        
        // Act
        $actual = $g->score();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    public function testTwoThrowsNoMark()
    {
        // Arrange
        $g = new \Model\Game();
        $g->add(5, 4);

        $expected = 9;
        
        // Act
        $actual = $g->score();

        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    public function testFourThrowsNoMark()
    {
        // Arrange
        $g = new \Model\Game();
        $g->add(5, 4);
        $g->add(7, 2);

        $expected = 18;
        
        // Act
        $actual = $g->score();

        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    public function testSimpleSpare()
    {
        // Arrange
        $g = new \Model\Game();
        $g->add(3, 7);
        $g->add(3, 0);

        $expected = 13;
        
        // Act
        $actual = $g->scoreForFrame(1);

        // Assert
        $this->assertEquals($expected, $actual);
    }
        
    public function testSimpleStrike()
    {
        // Arrange
        $g = new \Model\Game();
        $g->add(10, 0);
        $g->add(3, 6);
        
        $expectedScoreFrameOne = 19;
        $expectedScore = 28;

        // Act
        $actualScoreFrameOne = $g->scoreForFrame(1);
        $actualScore         = $g->score();
        

        // Assert
        $this->assertEquals($expectedScoreFrameOne, $actualScoreFrameOne);
        $this->assertEquals($expectedScore, $actualScore);
    }
    
    
    public function testDoublePinfall()
    {
        // Arrange
        $g = new \Model\Game();
        $g->add(10, 0);
        $g->add(10, 0);
        $g->add(9, 0);

        $expected = 57;
        
        // Act
        $actual = $g->score();

        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    public function testTurkeyPinfall()
    {
        // Arrange
        $g = new \Model\Game();
        $g->add(10, 0);
        $g->add(10, 0);
        $g->add(10, 0);
        $g->add(0, 9);

        $expected = 78;
        
        // Act
        $actual = $g->score();

        // Assert
        $this->assertEquals($expected, $actual);
    }

}

