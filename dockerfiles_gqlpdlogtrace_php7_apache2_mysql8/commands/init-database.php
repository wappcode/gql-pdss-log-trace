<?php
echo "\n Preparando para inicializar base de datos \n";
$user = getenv("GQLPDSSLOGTRACE_DBUSER") ? getenv("GQLPDSSLOGTRACE_DBUSER") : 'root';
$pass = getenv("GQLPDSSLOGTRACE_DBPASSWORD") ?  getenv("GQLPDSSLOGTRACE_DBPASSWORD") : 'dbpassword';
$host = "gqlpdsslogtrace-mysql";
$databasename = getenv("GQLPDSSLOGTRACE_DBNAME") ?  getenv("GQLPDSSLOGTRACE_DBNAME") : 'gqlpdss_logtracedb';
$pdo = new PDO("mysql:host={$host}", $user, $pass);
echo "\n Limpiando base de datos {$databasename} \n";
$pdo->exec("DROP DATABASE IF EXISTS {$databasename};");
echo "\n Creando base de datos {$databasename};";
$pdo->exec("CREATE DATABASE IF NOT EXISTS {$databasename};");
