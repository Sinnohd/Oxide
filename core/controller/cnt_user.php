<?php
/**
 * User controller - Provides all actions for user management, like create, edit, delete, lock, forgot_password, ...
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/core/controller/user
 */

// create global database object
$db = new db();

// create user backend auth object
$auth = new configuration::$auth_backend();

// create user abstraction object
$user = new user();

/**
 * Function: Create user.
 * @global user $user 
 */
function create () {
    global $user;
 
    $input=array();
    $input=url_action_decoder();

    if(!($input['user']=="" or $input['password']=="" or $input['email']=="")) {
            $user->create($input['user'], $input['password'], $input['email']);

    } else {
            logger::log("Parameter missing or wrong!");
    }
    
}
  
/**
 * Function: Logout user.
 * @global type $session 
 */
function logout () {
    global $session;

    $session->destroy_session();
    header('Location: /index.php');
    
}


?>
