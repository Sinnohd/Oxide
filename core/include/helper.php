<?php
/**
 * Helper file, for often used functions
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/support
 */


/** 
 * Function: class autoloader: Tries to detect & automatically loads the appropriate class for a new command.
 * First in user directory and if this doesn't work in Oxide core directory.
 */
function class_autoloader()
{
    spl_autoload_register(function ($class) {
        if (!@include('classes/' . $class . '.class.php'))
                if(!@include('core/classes/' . $class . '.class.php'))
                        include 'libs/' . $class . '.class.php';                           
    });
}

/** 
 * Function: url_action_decoder
 * @return array with two values, used to identify controller and function/interface to call
 */
function url_action_decoder()
{
    $url = $_SERVER['REQUEST_URI'];
    $url = strip_tags($url);
    
    $str=parse_url($url, PHP_URL_QUERY);
    $output=array();
    parse_str($str, $output);
    return $output;
}


/** 
 * Function: remove HTML tags from input variables. Mostly used for data retrieved via HTTP-POST/GET
 * @param string variable Some variable
 * @return string
 */
function filter_input_string($variable)
{
    $variable = strip_tags($variable);
    return $variable;
}

/**
 * Dumping a variable
 * @param type $variable 
 */
function dump($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}


?>
