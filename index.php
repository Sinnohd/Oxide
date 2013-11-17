<?php //
/**
 * Start
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package Oxide/base/index
 */

if ( !include("core/include/helper.php") )  { echo "Error: helper.php missing"; exit; }

if ( !include("libs/raintpl/rain.tpl.class.php") ) { echo "Error: RainTPL is missing"; exit; }
$tpl = new raintpl();

class_autoloader();

$conf = new configuration();
$db = new db();
$log = new logger();
$session = new session();

$sid = $session->create_session(); 
$_SESSION["LOGIN"]=FALSE;

// setup Rain TPL template System
raintpl::configure( 'cache_dir', 'views/cache/');
raintpl::configure( 'tpl_ext', 'tpl' );
raintpl::configure( 'path_replace', false );
raintpl::configure( 'tpl_dir', "views/templates/".configuration::$template_name."/" );

//echo "Backend: ".configuration::$auth_backend."<br>";


// Attention: Using global to access objects owned by global space is ugly. 
// TODO: Implement a class registry in future http://www.phppatterns.com/docs/design/the_registry

if (isset($_POST["login"])) {
    $username = $db->filter_db_input($_POST["username"]);
    $password = $db->filter_db_input($_POST["password"]);

    $auth = new configuration::$auth_backend();
    $user = new user();        

    if ($user->login($username, $password)){
                    $_SESSION["LOGIN"]=TRUE;            
    }
}

$tpl->assign('title', 'Radio Schattenspiel.com - Admin Bereich');
$tpl->draw('header');

if( $_SESSION["LOGIN"]==TRUE ) {

    $tpl->assign('sid', "sid=".$sid);
    $tpl->assign('brand', 'Radio Schattenspiel - Admin Bereich');
    $tpl->draw('body');


} else {
    $tpl->draw('login');
}

$tpl->draw('footer');

$db->disconnect();
$session->close_session();

?>