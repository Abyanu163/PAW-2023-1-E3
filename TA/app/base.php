<?php 
$servername = "localhost"; // Bisa localhost atau example.com atau base.example.svr
$username = "root"; // Username / Nama pengguna
$password = ""; // Kata sandi sangat sensitif. Harap hati-hati
$dbname = "meatmaster"; // MySQL langsung, tapi kalau PosgreSQL seperti '"public"."ExampledataBase"'
$databaseProvider = "mysql"; // MySQL, MariaDB, PosgreSQL, AzureSQL, ...

define("BASEURL", "http://localhost/paw/TA");
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"]."/paw/TA");
define("PDO_USED", new PDO("{$databaseProvider}:host={$servername};dbname={$dbname}",$username,$password));