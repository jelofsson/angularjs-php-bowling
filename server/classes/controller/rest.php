<?php

// Rest - Web API Controller
namespace Controller;
class Rest {
    
	// Instantiate class
	function __construct() {
        
        // Get fatfree framework application instance
		$app=\Base::instance(); 
        
        // Start the output buffer
        ob_start();
        
        // Get form data that was passed with the incomming request
		$app->set('REQUEST', json_decode($app->get('BODY'),true)); // php://input
	}

	//! HTTP route pre-processor
	function beforeroute($app) {
	   
	}

	//! HTTP route post-processor
	function afterroute($app) {
        
        // Checking if we have anything inside 'response.content' to return
        if($app->get('response.content'))
        {
            // Set what content-type we should return (default: application/json)
            $app->set('response.contentType', $app->get('response.contentType') ?
                                        strtolower($app->get('response.contentType')) :
                                        'application/json');
            
            // Set Web API response headers (no cache)
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
            header('Content-type: ' . $app->get('response.contentType'));
            header('Pragma: no-cache');
            header('Cache-Control: no-store, no-cache, must-revalidate');
            
            // Clean (erase) the output buffer
            ob_clean();

            switch ($app->get('response.contentType')) {
                case 'application/json':
                    function isJson($string) {
                        json_encode($string);
                        return (json_last_error() == JSON_ERROR_NONE);
                    }
                    // Printing json, if invalid json we print a error message.
                    if(isJson($app->get('response.content')))
                    {
                        echo json_encode($app->get('response.content'));
                    }
                    else
                    {
                        echo json_encode(array('success' => FALSE, 'message' => 'An error occured.'));
                    }
                break;
            }

            die();
        }
	}
   
}