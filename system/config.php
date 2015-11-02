<?php 

 // banco de dados
define( 'DB_HOSTNAME', 'localhost' );
define( 'DB_USERNAME', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_DATABASE', 'sistema' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_PREFIX', 'gs' );

//urls
define('URL_BASE', 'http://localhost/painel/');
define('URL_REGISTER', URL_BASE.'includes/register.php');
define('URL_PAINEL', URL_BASE.'includes/painel.php');

//DIR's
define('DIR_BASE', $_SERVER['DOCUMENT_ROOT'].'/painel/');
define('DIR_SYSTEM', DIR_BASE.'system/');

// FILE'S
define('FILE_CONFIG', DIR_SYSTEM.'config.php');
define('FILE_HELP', DIR_SYSTEM.'help.php');
define('FILE_DATABASE', DIR_SYSTEM.'database.php');

 ?>