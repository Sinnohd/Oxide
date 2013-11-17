<?php
/**
 * User Authentication & Management 
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/core/class
 */

/**
 * User Authentication & Management Class, 
 * Attention: This class should never accessed directly.
 *
 * @package  Oxide/core/class/user/mysql-db
 * @uses & used-by: database as $db, configuration as $conf
 */
class user_db
{      
    /** 
     * Function: create user
     * @param username string Username
     * @param password string Password
     * @param email string User E-Mail
     * @return boolean
     */
    
    static function create($username, $password, $email)
    {   
        $pw_comb = $this->create_pwhash($password);
        
        if (db::query("insert into users (username,password,email,salt) values ('$username','$pw_comb[0]','$email','$pw_comb[1]') "))
        {
            logger::audit("Successfully created user $username");
            return true;
        } else {
            logger::log("Error creating user $username");
            return false;
        }
    }
    
    /** 
     * Function: user login
     * @param username string Username
     * @param password string Password
     * @return boolean
     */
    static function login($username, $password)
    {
        $result = db::query("select password, salt from users where username = '$username'");
                                     
        if (crypt($password, '$2y$07$'.$result["salt"].configuration::$pw_salt) == $result["password"]){
            logger::audit("User $username successful authenticated.");
            return true;
        } else {
            logger::audit("User $username NOT authenticated.");
            return false;
        }
    }
    
    
    /**
     * Function: creates crypted password and returns array with hashed password and used user specific salt.
     * @param password string Password
     * @return array[crypted password][user specific salt]
     */
    private function create_pwhash($password)
    {
        //create password salt, consists of general and per user part.
        $usalt = "";
        for ($i = 0; $i < 20; $i++) {
            $usalt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1);
        }
        $salt = $usalt.configuration::$pw_salt;
        // we use the "fixed" blowfish encryption, so minimum PHP version is 5.3.7        
        $pw_comb[0] = crypt($password, '$2y$07$'.$salt);
        $pw_comb[1] = $usalt;
        
        return $pw_comb;
    } 

    /**
     * Function: sends mail with pw reset link.
     * @todo Needs to be filled with life...
     * @param username string Username
     * @param email string User E-Mail
     * @return boolean
     */    
    static function forgot_password($username, $email)
    {
               
        return false;
    }

    
    
    
}

?>