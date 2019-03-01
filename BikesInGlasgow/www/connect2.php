<?php
try
{
$pdo = new PDO('mysql:host=localhost;dbname=foleyfol_testDB', 'foleyfol_testDB', 'BikesInGlasgow');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
echo 'Unable to connect to the database server: ' . $e->getMessage();
exit();
}
?>