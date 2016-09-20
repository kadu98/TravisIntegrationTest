#!/usr/bin/env php
<?php

$mysql_host = getenv('MYSQL_HOST') ?: 'localhost';
$mysql_user = getenv('MYSQL_USER') ?: 'root';
$mysql_password = getenv('MYSQL_PASSWORD') ?: '';

$connection_string = "mysql:host={$mysql_host};dbname=numbers";
$db = new PDO($connection_string, $mysql_user, $mysql_password);

$count = $db->exec("
  INSERT INTO numbers
    (number)
  VALUES
    (1),
    (2),
    (10),
    (42),
    (0),
    (-100),
    (123456789),
    (-33);
");

// "run" the calculator
require dirname(__FILE__) . '/../doubler.php';

$stmt = $db->prepare("SELECT number_calculated FROM numbers");
$stmt->execute();

$result = $stmt ->fetchAll();

testCalculatedNumber(0, 2, $result);
testCalculatedNumber(1, 4, $result);
testCalculatedNumber(2, 20, $result);
testCalculatedNumber(3, 84, $result);
testCalculatedNumber(4, 0, $result);
testCalculatedNumber(5, -200, $result);
testCalculatedNumber(6, 246913578, $result);
testCalculatedNumber(7, -66, $result);

echo "All numbers OK\n";

// a simple helper function to easily test for the correct data
function testCalculatedNumber($index, $expected, $result)
{
  $number_calculated = (int)$result[$index]['number_calculated'];

  if($number_calculated !== $expected) {
    echo "Expected number calculated to be '{$expected}', got '{$number_calculated}'\n";

    // exit with the correct error code so Travis CI picks this up as a failed test
    exit(1);
  }
}
