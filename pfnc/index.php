<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/woodart.php';

$db = new QueryBuilder(Connection::make());
$usersIn = $db->selectAll("users", "substatus='in'");
$usersOut = $db->selectAll("users", "substatus='out'");
$langs = array_keys($langFile);
?>