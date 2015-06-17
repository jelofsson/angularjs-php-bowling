<?php
 
// Bowling controller
namespace Controller;
use Model\Game;

class Bowling extends Rest {
    
	// Instantiate class
	function __construct() {
		parent::__construct();
	}

    public function score($app) {
        
        // Create a new game object
        $g = new \Model\Game();
        
        // Add frames to our game
        for($i=0; $i<count($app->get('REQUEST.frames')); $i++) {
            $frame = (object)$app->get('REQUEST.frames')[$i];
            
            if($i<9 || !isset($frame->bonus)) {
                // Add regular frame
                $g->add($frame->first, $frame->second);
            } else if($i==9) {
                // Add last frame
                $g->add($frame->first, $frame->second, $frame->bonus);
            }
        }
       
        // Output result
        $app->set('response.content', array(
            'score' => $g->score()
        ));
        
    }
   
}