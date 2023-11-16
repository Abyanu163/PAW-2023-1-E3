<?php
function checkAdminTable($PDO_USED) {
    $stateResult = $PDO_USED->prepare("SELECT * FROM karyawan;");
    $stateResult->execute();
    if ($stateResult->rowCount() <= 0) {
        return header("Location: ".BASEURL."/app/admin/register.php");
    } else {
        return;
    }
    return;
}
function checkCustomerTable($PDO_USED) {
    $stateResult = $PDO_USED->prepare("SELECT * FROM customers;");
    $stateResult->execute();
    if ($stateResult->rowCount() <= 0) {
        return header("Location: ".BASEURL."/app/admin/register.php");
    } else {
        return;
    }
    return;
}
function checkSignIn($checking) {
    return isset($checking);
}
?>