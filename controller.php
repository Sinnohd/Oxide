<?php
/**
 * Easy controller, calls the modules in the controller subdirectory and the associated functions inside, based on the URL.
 * As example: http://.../controller/test/info/...  Calls module test and function info defined in test.
 * Controller provides already configuration and logger class.
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package Oxide/base/controller
 */


if ( !include("core/include/helper.php") )  { echo "Error: helper.php missing"; exit;}

class_autoloader();

// create global configuration object    
$conf = new configuration();

// create session object
$session = new session();
$session->join_session();

if (isset($_SESSION["LOGIN"]) && $_SESSION["LOGIN"] == TRUE) {
    $url = $_SERVER['REQUEST_URI'];
    $url_path=parse_url($url, PHP_URL_PATH);
    $url_parts = explode("/", $url_path);

    // Check first in user directory
    $custom = false;
    if (file_exists("controller/cnt_$url_parts[2].php")) {

        include ("controller/cnt_$url_parts[2].php");
        $custom = true;

        if (function_exists($url_parts[3])){
            call_user_func($url_parts[3]);        
        } else {
            $custom = false;
        }   
    // then in Oxide core dir
    } elseif (file_exists("core/controller/cnt_$url_parts[2].php") && $custom == false) {

        include ("core/controller/cnt_$url_parts[2].php");

        if (function_exists($url_parts[3])){
            call_user_func($url_parts[3]);        
        } else {
            logger::log("Error: Controller action $url_parts[3] doesn't exist");
        }   
    }
    else
    {
        logger::log("Error: Controller $url_parts[2] doesn't exist");
    }
} else {
    logger::log("Error: Not Authenticated!");    
}

?>
