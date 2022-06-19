
<?php
$ip = $_SERVER['REMOTE_ADDR'];

define('GDB_HOST', "localhost");
define('GDB_USER', 'root');
define('GDB_PASS', ''); 
define('GDB_NAME', 'bosaso');  
define('ROOT_PATH', '/');
define('REL_DIR', dirname(__FILE__));
define('SYS_LANG',  "en" );
define('LANG_DIR',  "ltr" );

define("SB" ,DIRECTORY_SEPARATOR);

define('ROOT_URL', rtrim('http://bosaso.test/', '/'));
date_default_timezone_set('Asia/Kuwait');
 

$_SESSION['ROOT_URL'] = ROOT_URL;
