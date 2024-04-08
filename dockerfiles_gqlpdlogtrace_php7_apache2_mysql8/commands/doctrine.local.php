<?php
return [
    "driver" => [
        'user'     =>   getenv('GQLPDSSLOGTRACE_DBUSER') ? getenv('GQLPDSSLOGTRACE_DBUSER') : 'root',
        'password' =>   getenv('GQLPDSSLOGTRACE_DBPASSWORD') ? getenv('GQLPDSSLOGTRACE_DBPASSWORD') : 'dbpassword',
        'dbname'   =>   getenv('GQLPDSSLOGTRACE_DBNAME') ? getenv('GQLPDSSLOGTRACE_DBNAME') : 'gqlpdss_logtracedb',
        'driver'   =>   'pdo_mysql',
        'host'   =>     getenv('GQLPDSSLOGTRACE_DBHOST') ? getenv('GQLPDSSLOGTRACE_DBHOST') : 'localhost',
        'charset' =>    'utf8mb4'
    ],
    "entities" => require __DIR__ . "/doctrine.entities.php"
];
