<?php 
$PDO_server = "127.0.0.1"; // Bisa localhost atau example.com atau base.example.svr
$PDO_username = "root"; // Username / Nama pengguna
$PDO_password = ""; // Kata sandi sangat sensitif. Harap hati-hati
$PDO_dbname = "meatmaster"; // MySQL langsung, tapi kalau PosgreSQL seperti '"public"."ExampledataBase"'
$PDOdatabaseProvider = "mysql"; // MySQL, MariaDB, PosgreSQL, AzureSQL, ...
$PDO_dsn = $PDOdatabaseProvider.':dbname='.$PDO_dbname.';host='.$PDO_server; // Menggabungkan DSN yang variabel sebelumnya

// Konfigurasi BASEURL menyesuaikan dengan BASEPATH di mana setelah $_SERVER["DOCUMENT_ROOT"]
// Pastikan benar-benar dipahami antara BASEURL dengan BASEPATH
define("BASEURL", "/paw/TA");
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"]."/paw/TA");
define("PDO_Connect", (new PDO($PDO_dsn, $PDO_username, $PDO_password))); // Definisi PDO_Connect