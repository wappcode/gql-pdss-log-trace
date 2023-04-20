<?php
// Renombrar o crear archivo doctrine.local.php utilizando como base este
return [
    "driver" => [
        'user'     =>   'root',
        'password' =>   'dbpassword',
        'dbname'   =>   'gqlpdssdb',
        'driver'   =>   'pdo_mysql',
        'host'   =>     '127.0.0.1',
        'charset' =>    'utf8mb4'
    ],
    "entities" => require __DIR__ . "/doctrine.entities.php"
];
