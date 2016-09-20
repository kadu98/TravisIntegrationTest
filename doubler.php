<?php

$mysql_host = getenv('MYSQL_HOST') ?: 'localhost';
$mysql_user = getenv('MYSQL_USER') ?: 'root';
$mysql_password = getenv('MYSQL_PASSWORD') ?: '';

$connection_string = "mysql:host={$mysql_host};dbname=numbers";
$db = new PDO($connection_string, $mysql_user, $mysql_password);

// TODO: at "WHERE number_calculated = NULL" statement so we don't
// recalculate stuff
$db->exec("UPDATE numbers SET number_calculated = number*2 WHERE number_calculated IS NULL");
