<?php
/**
 * Configuration File
 *
 * @author  Jens Brey <jens@brey.biz>
 *
 * @since 1.0
 * @package Oxide/base/config
 */

// Minimum supported PHP version is 5.3.7!

// Basic MySQL parameters
$db_host = 'localhost'; // Host name Normally 'LocalHost'
$db_username = 'username'; // MySQL login username
$db_password = 'password'; // MySQL login password
$db_database = 'oxide'; // Database name

// Use different salts...
$pw_salt = "1234567890abcdefgh";
$session_salt = "1234567890abcdefgh";

// Logfile
$log_file="/var/log/apache2/Oxide.php.log";
$audit_log_file="/var/log/apache2/Oxide.audit.log";

$auth_backend="db";

// Redis configuration
$redis_host="127.0.0.1";
$redis_port="6379";
$redis_auth = "";

// Rain TPL Template configuration
$template_name = "example";

// File Upload directory, used by file controller
$upload_dir = "/srv/files/tmp/";

// AutoDJ base directory
$autodj_base = "";

?>
