<?php
/**
 * User abstraction/reflection class. Used to use various backends for authentication, like LDAP. Per default it points to MySQL DB based authentication.
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/core/class
 */

/**
 * User management abstraction class, points per default to MySQL DB based authentication. 
 * @uses & used-by database as $db, configuration as $conf
 * @package  Oxide/core/class/user
 */
class user
{

    /** 
     * Function: create user
     * @param username string Username
     * @param password string Password
     * @param email string User E-Mail
     * @return boolean
     */
    public function create($username, $password, $email)
    {   
        if ( configuration::$auth_backend == 'user_db' )
            return user_db::create($username, $password, $email);
    }
    
    /** 
     * Function: user login
     * @param username string Username
     * @param password string Password
     * @return boolean
     */
    public function login($username, $password)
    {
        if ( configuration::$auth_backend == 'user_db' )
            return user_db::login($username, $password);
    }

    /**
     * Function: sends mail with pw reset link.
     * @param username string Username
     * @param email string User E-Mail
     * @return boolean
     */    
    public function forgot_password($username, $email)
    {
        if ( configuration::$auth_backend == 'user_db' )
            return user_db::forgot_password($username, $email);
    }
    
    
}

?>
