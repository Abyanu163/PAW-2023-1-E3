<?php

$userRoleID = $_SESSION['userRoleID'] ?? $_COOKIE['userRoleID'] ?? FALSE;
$userID = $_SESSION['userID'] ?? $_COOKIE['userID'] ?? FALSE;
$userType = $_SESSION['userType'] ?? $_COOKIE['userType'] ?? FALSE;
var_dump($userID);
var_dump($userRoleID);
var_dump($userType)

?>