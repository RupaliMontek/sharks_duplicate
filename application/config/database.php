<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'       => '',
    'hostname'  => 'localhost',
    'username'  => 'root',
    'password'  => '',
    'database'  => 'msuite_office_mgmt',
    'dbdriver'  => 'mysqli',
    'dbprefix'  => '',
    'pconnect'  => FALSE,
    'db_debug'  => (ENVIRONMENT !== 'production'),
    'cache_on'  => FALSE,
    'cachedir'  => '',
    'char_set'  => 'utf8',
    'dbcollat'  => 'utf8_general_ci',
    'swap_pre'  => '',
    'encrypt'   => FALSE,
    'compress'  => FALSE,
    'stricton'  => FALSE,
    'failover'  => array(),
    'save_queries' => TRUE
);

$db['login'] = array(
    'dsn'       => '',
    'hostname'  => 'localhost',
    'username'  => 'root',  // Change this to the correct login username
    'password'  => '',  // Change this to the correct login password
    'database'  => 'sharksjob_backend',
    'dbdriver'  => 'mysqli',
    'dbprefix'  => '',
    'pconnect'  => FALSE,
    'db_debug'  => (ENVIRONMENT !== 'production'),
    'cache_on'  => FALSE,
    'cachedir'  => '',
    'char_set'  => 'utf8',
    'dbcollat'  => 'utf8_general_ci',
    'swap_pre'  => '',
    'encrypt'   => FALSE,
    'compress'  => FALSE,
    'stricton'  => FALSE,
    'failover'  => array(),
    'save_queries' => TRUE
);

$db['sharksjob_backend'] = array(
    'dsn'   => '',
    'hostname'  => 'localhost',
    'username'  => 'root',  // Change this to the correct login username
    'password'  => '',  // Change this to the correct login password
    'database'  => 'sharksjob_backend',
    'dbdriver' => 'mysqli', // or 'pdo' based on your setup
    'dbprefix' => '', // You can leave it empty unless you are using a table prefix
    'pconnect' => FALSE, // TRUE for persistent connection or FALSE for non-persistent
    'db_debug' => (ENVIRONMENT !== 'production'), // Set this to TRUE for development
    'cache_on' => FALSE, // Cache query results, can be set to TRUE if needed
    'cachedir' => '', // Set cache directory if cache_on is TRUE
    'char_set' => 'utf8', // Character set
    'dbcollat' => 'utf8_general_ci', // Collation
    'swap_pre' => '', // Swap prefix
    'encrypt' => FALSE, // Encryption flag
    'compress' => FALSE, // Compression flag
    'stricton' => FALSE, // Strict mode flag
    'failover' => array(), // Failover database configurations (if needed)
    'save_queries' => TRUE // Whether to save query strings for debugging
);



?>