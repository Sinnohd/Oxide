<?php

/**
  * Session Management based on default PHP implementation
  *
  * @author  Jens Brey <jens@brey.biz>
  *
  * @since 1.0
  * @package  Oxide/class
  */

/**
  * Session Management Class
  *
  * @package  Oxide/class/session
  */
class session 
{

    /** 
     * Function: Verify if session is valid
     * @return boolean
     */
    public function validate_session()
    {
       if ( session_id() != "" ) { return TRUE; } else { return FALSE; }
    }

    /** 
     * Function: Creates a session
     * @return string sid
     */
    public function create_session()
    {
        ini_set("session.use_only_cookies",0);
        if ( $this->validate_session() ) { $this->destroy_session(); }
        session_name("sid");
        session_start();
        $_SESSION = array();
        session_regenerate_id();
        $sid = session_id();        
        return $sid;
    }

    /** 
     * Function: Joins an existing session
     * @return string sid of existing session
     */
    public function join_session()
    {
        ini_set("session.use_only_cookies",0);
        session_name("sid");
        session_start();
        $sid = session_id();        
        return $sid;
    }

    /** 
     * Function: Destroys an existing session
     */
    public function destroy_session()
    {        
        if ( $this->validate_session() ) { session_destroy(); }
    }

    /** 
     * Function: Close an existing session
     */ 
    public function close_session()
    {        
        if ( $this->validate_session() ) { session_write_close(); }
    }

    
    
}

?>
