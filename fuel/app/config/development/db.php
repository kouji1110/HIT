<?php

/**
 * The development database settings. These get merged with the global settings.
 */
return array(
    'default' => array(
        'type' => 'pdo',
        'connection' => array(
            'dsn' => 'mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=HIT',
            'username' => 'root',
            'password' => 'root',
            'persistent' => FALSE,
        ),
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => false,
        'profiling' => true,
    ),
);
