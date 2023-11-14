<?php
function checkAdminTable($PDO_USED) {
    $stateResult = $PDO_USED->prepare("SELECT * FROM karyawan;");
    $stateResult->execute();
    foreach ($stateResult as $key => $value) {
        if (!isset($key[$value])) {
            return header("Location: ".BASEURL."/app/admin/register.php");
        } else {
            return;
        }
    }
    return;
}
function checkCustomerTable($PDO_USED) {
    $stateResult = $PDO_USED->prepare("SELECT * FROM customers;");
    $stateResult->execute();
    foreach ($stateResult as $key => $value) {
        if (!isset($key[$value])) {
            return header("Location: ".BASEURL."/app/customer/register.php");
        } else {
            return;
        }
    }
    return;
}
function checkSignIn($checking) {
    return isset($checking);
}
?>