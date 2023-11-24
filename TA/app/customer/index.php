<?php
session_start();
require("templates/header.php");
checkSignedIn();
header("Location: ".BASEURL."/app/customer/product.php");
?>