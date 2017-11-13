<?php

/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */
return array(
    'active' => 'localdb',
    
    // 開発用(ローカルmysql ソケット)
    'localdb' => array(
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
