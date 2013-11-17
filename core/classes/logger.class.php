<?php
/**
 * Logging, implements general log and if enabled, audit log functionality. 
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package  Oxide/class
 */

/**
 * Logging class, provides two functions for auditing and general logging. 
 * @uses    configuration as $conf
 * @package  Oxide/class/logger
 */
class logger {

    /**
     * Function: log, provides logging into a file.
     * @param string Message to add to the general logfile
     */    
    public function log ($string)
    {        
        $logfile=configuration::$log_file;
        $fp = fopen($logfile, 'a') or exit("Can't open $logfile!");
        $time = date('[d/M/Y H:i:s]');
        $script_name = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        fwrite($fp, "$time ($script_name) $string" . PHP_EOL);
        fclose($fp);
    }

    /**
     * Function: audit, provides auditing into a file. Should be used to log user interactions
     * @param string Message to add to the audit logfile
     */    
    public function audit ($string)
    {        
        $audit_log_file=configuration::$audit_log_file;
        $fp = fopen($audit_log_file, 'a') or exit("Can't open $audit_log_file!");
        $time = date('[d/M/Y H:i:s]');
        $script_name = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        fwrite($fp, "$time ($script_name) $string" . PHP_EOL);
        fclose($fp);
    }

    
    
}
