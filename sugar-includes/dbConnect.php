<?php
/**
 * Database connection settings
 **/

$db = array(
    'host' => 'localhost',
    'name' => 'sugar_dev',
    'user' => 'sugar_dev',
    'pass' => '}570$)&535=C@#u',
);

/**
 * End of customizable settings
 **/

try {
    $db = new PDO("mysql:dbname={$db['name']};host={$db['host']}", $db['user'], $db['pass'], array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}