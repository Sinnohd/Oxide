<?php
/**
 * MySQL Database access
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/class
 */

/**
 * Mysql Database access class
 *
 * @package  Oxide/class/db
 */
class db
{
    /**
     * Default public MYSQL object to work with
     * @var type 
     */
    private static $mysqli;

    /**
     * Default constructor, initiates DB connection
     */
    function __construct() {
        $this->connect(configuration::$db_username, configuration::$db_password, configuration::$db_host, configuration::$db_database, configuration::$db_port);
    }

    /**
     * Default de-constructor, closing DB connection
     */
    function __deconstruct() {
        $this->disconnect();
    }

    /** 
     * Function: connect - creates connection to MySQL DB.
     * @param username string DB username
     * @param password string DB password
     * @param host string DB host
     * @param database string DB name
     * @param port int DB port, default is 3306
     */
    static function connect($username, $password, $host, $database, $port)
    {     
        $mysqli = new mysqli($host, $username, $password, $database, $port);
        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }        
        self::$mysqli=$mysqli;
        
    }

    /** 
     * Function: disconnect - Disconnects from MySQL DB
     */
    static function disconnect()
    {
        self::$mysqli->close();
    }

    /** 
     * Function: query - queries MySQL DB and returns, depending on the SQL command a resultset as an string, array or boolean.
     * @param string query SQL query to run
     * @return string|array|boolean  
     * @todo Write a test to check all possible sql actions and result types.
     * 
     * Multiple Testcases:
     * 
     *      echo "select a non existing line...";
     *      $band_id = $db->query("select band_id from mp3_band where name = 'not in this db'");
     *      dump($band_id);
     *
     *      echo "select a single line...";
     *      $band_id = $db->query("select band_id from mp3_band where name = 'Test'");
     *      dump($band_id);
     *
     *      echo "select multiple lines...";
     *      $band_id = $db->query("select * from mp3_band");
     *      dump($band_id);
     *
     *      echo "Successful DML test... returns true";
     *      $band_id = $db->query("insert into mp3_band (name) values ('Test23')");
     *      dump($band_id);
     *
     *      echo "Un-successful DML test.... return error...";
     *      $band_id = $db->query("insert into mp3_band (nameddd) values ('Test23')");
     *      dump($band_id);
     *
     */    
    static function query($query)
    {
        $result = self::$mysqli->query($query);     
        
        if (is_bool($result)){
             ( $result == TRUE ) ? $resultset = TRUE : $resultset = FALSE;
        } else {
            if ($result->num_rows > 1 ){
                // return n*m dimensions array.
                $resultset=array();
                while ($row = $result->fetch_array(MYSQL_ASSOC)) {
                    $resultset[] = $row;
                }           
                $result->close();
            } elseif ($result->num_rows == 1 && $result->field_count > 1 ) {
                $resultset=array();
                $resultset = $result->fetch_array(MYSQL_ASSOC);
                $result->close();
            } elseif ($result->num_rows == 1 && $result->field_count == 1 ) {
                $inres = $result->fetch_array(MYSQL_NUM);
                $resultset = $inres[0];
                $result->close();
            } elseif ($result->num_rows == 0)  {
                $resultset = FALSE;            
            } else {
                logger::log("Error: ".$this->mysqli->error);
                $resultset = FALSE;
            }
        }
        return $resultset;       
    }

    /** 
     * Function: filter_db_input - Checks variable for dangerous content and escapes or removes it. 
     * Use before you create your SQL command and filters user input.
     * @param variable string Variable to filter usually retrieved via HTTP GET/POST
     * @return string variable
     */    
    static function filter_db_input($variable)
    {
        $variable = self::$mysqli->real_escape_string($variable);
        return $variable;
    }
    
    /**
     * Function: get_auto_increment_id - returns auto_increment_id from last insert statement.
     * @return type 
     */
    static function get_auto_increment_id()
    {
        return self::$mysqli->insert_id;        
    }
    
    
}


?>
