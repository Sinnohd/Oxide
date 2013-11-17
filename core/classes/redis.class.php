<?php
/**
 * Redis accessiability class 
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/core/class
 */

/**
 * Redis access class 
 * We leverage for connectivity to Redis (<a href="http://redis.io/">http://redis.io/</a>) the phpRedis software (<a href="https://github.com/nicolasff/phpredis/blob/master/README.markdown">https://github.com/nicolasff/phpredis/blob/master/README.markdown</a>).
 * @package  Oxide/core/class/redis
 */
class redis 
{
   
    /**
     * General redis object to work on
     * @var type 
     */
    public $redis;
    
    /**
     * Redis Class default constructor, checks if extension is available and connects to Redis server.
     */
    function __construct() {
        if (extension_loaded("Redis"))
        {
            $this->redis = new Redis();
            $this->connect(configuration::$redis_auth, configuration::$redis_host, configuration::$redis_port);
        } else {
            logger::log("Error: Redis extension not available");
            exit;
        }
    }

    /**
     * Redis de-structor, disconnects from Redis server and destroys class 
     */
    function __deconstruct() {
        $this->disconnect();
    }

    /**
     * Redis connect - Connects to Redis server. Usually called by constructor
     * @param type $auth
     * @param type $host
     * @param type $port 
     */
    function connect ($auth, $host, $port)
    {   
        $this->redis->connect($host, $port);
        
        if ( $auth != "") 
        {
            $this->redis->auth($auth);
        }
    }
    
    /**
     * Redis disconnect - Closes connection to Redis server. Usually called by de-constructor. 
     */
    function disconnect () {   
        $this->redis->close();
        
    }
    
    /**
     * Redis getkeys() - Retrieves a list of keys, based on keyname or a placeholder
     * @param type $key
     * @return type 
     */
    function getkeys($key) {
        return $keys = $this->redis->keys($key); 
    }
    
    
    
}



?>
