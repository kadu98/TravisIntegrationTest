#!/usr/bin/env php
<?php

$mysql_host = getenv('MYSQL_HOST') ?: 'localhost';
$mysql_user = getenv('MYSQL_USER') ?: 'root';
$mysql_password = getenv('MYSQL_PASSWORD') ?: '';

$connection_string = "mysql:host={$mysql_host}";
$db = new PDO($connection_string, $mysql_user, $mysql_password);

$schema = file_get_contents(dirname(__FILE__) . '/schema.sql');
$db->exec($schema);
