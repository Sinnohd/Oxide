<?php
/**
 * Configuration class, provides configuration variables as objects and does basic verification
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/class
 */

/**
 * Configuration class, reads config.php file, applies some basic checks and creates a configuration object. 
 * @uses
 * @package  Oxide/class/configuration
 */
class configuration 
{
    /**
     * DB Username
     * @var string
     */
    public static $db_username = 'mysql'; 
    /**
     * DB Password
     * @var string 
     */
    public static $db_password = 'mysql';
    /**
     * DB Host
     * @var string 
     */
    public static $db_host = '127.0.0.1';
    /**
     * DB used
     * @var string
     */
    public static $db_database = 'mysql';
    /**
     * DB port
     * @var int
     */
    public static $db_port = 3306;
    /**
     * General PW salt for this Oxide installation
     * @var string 
     */
    public static $pw_salt = '1234567';
    /**
     * Session Salt for this Oxide installation (unused so far)
     * @var string 
     */
    public static $session_salt = '1234567';
    /**
     * General logfile
     * @var string
     */    
    public static $log_file = 'service.log';
    /**
     * Audit logfile
     * @var string
     */   
    public static $audit_log_file = 'audit.log';
    /**
     * Used Authentication backend, per default MySQL DB.
     * @var string 
     */    
    public static $auth_backend = 'db';
    /**
     * Redis host, necessary if Redis is used in a project.
     * @var string 
     */    
    public static $redis_host = '127.0.0.1';
    /**
     * Redis TCP port.
     * @var int 
     */    
    public static $redis_port = 6379;
    /**
     * Redis Authentication.
     * @var string 
     */    
    public static $redis_auth = 'redis';
    /**
     * Rain TPL Template to use 
     * @var string 
     */
    public static $template_name = 'default';
    /**
     * Upload directory
     * @var string 
     */
    public static $upload_dir = '/tmp';
    /**
     * Base directory for AutoDJ
     * @var type 
     */
    public static $autodj_base = '/var/autodj';
            
    /**
     * Function: Default constructor, calls init().
     */    
    function __construct() {
        $this->init();
    }

    /**
     * Function: initialize configuration object, used via global space.
     */    
    public function init()
    {
        if( !include("./config.php") )  { echo "Error: config.php missing"; exit;}
        
        // TODO: Check if this parameters are set
        $this::$db_username=$db_username;
        $this::$db_password=$db_password;
        $this::$db_host=$db_host;
        $this::$db_database=$db_database;
        
        (!isset($db_port) or $db_port == "") ? $this::$db_port=3306 : $this::$db_port=$db_port;
        
        // TODO: Check for salt length. Limit to 30 Characters...
        $this::$pw_salt=$pw_salt;
        $this::$session_salt=$session_salt;
        
        // TODO: Check if file location exists and is writable
        $this::$log_file=$log_file;
        $this::$audit_log_file=$audit_log_file;
        $this::$auth_backend="user_".$auth_backend;
        
        // Redis connection parameters
        $this::$redis_auth=$redis_auth;
        $this::$redis_host=$redis_host;
        $this::$redis_port=$redis_port;
        
        // Smarty configuration parameters
        $this::$template_name = $template_name;

        // Upload directory
        $this::$upload_dir = $upload_dir;
        
        // AutoDJ 
        $this::$autodj_base = $autodj_base;

        
    }
    
}

?>
