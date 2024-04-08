<?php
ini_set("display_error", 1);
error_reporting(E_ALL);
echo "\n Preparando para insertar datos en la  base de datos \n";
$user = getenv("GQLPDSSLOGTRACE_DBUSER") ? getenv("GQLPDSSLOGTRACE_DBUSER") : 'root';
$pass = getenv("GQLPDSSLOGTRACE_DBPASSWORD") ?  getenv("GQLPDSSLOGTRACE_DBPASSWORD") : 'dbpassword';
$host = "gqlpdsslogtrace-mysql";
$databasename = getenv("GQLPDSSLOGTRACE_DBNAME") ?  getenv("GQLPDSSLOGTRACE_DBNAME") : 'gqlpdss_logtracedb';
$pdo = new PDO("mysql:host={$host};dbname={$databasename}", $user, $pass);

$sql = file_get_contents(__DIR__ . "/database.sql");
if (empty($sql)) {
    echo "\n No hay datos que insertar";
    exit;
}
echo "\n Insertando datos {$databasename};\n";
echo $sql;
try {
    $pdo->query($sql);
    echo "\n Datos insertados\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
