<?php

function checkAdminTable($PDO_USED, $table) {
    try {
        $stateResult = $PDO_USED->prepare("SHOW TABLES LIKE {$table}");
        $stateResult->execute();
    } catch (PDOException $e) {
        return header("Location: ".BASEURL."/app/admin/register.php");
    }
    return ;
}
function isSetField($fieldValue, $fieldInput) {
    if (!isset($fieldValue)) {
        return FALSE;
    } else {
        return validSetField($fieldValue, $fieldInput);
    }
}
function validSetField($fieldValue, $fieldInput) {
    switch ($fieldInput) {
        case $fieldInput = 'username':
            if (!preg_match("/^[a-zA-Z0-9]+$/", $fieldValue)) {
                return;
            } else {
                break;
            }
        case $fieldInput = 'password':
            if (strlen($fieldValue) < 8) {
                return;
            } else if (strlen($fieldValue) >= 99) {
                return;
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#&*\.\-])$/", $fieldValue)) {
                return;
            } else {
                break;
            }
        default:
            break;
    };
    return;
}

?>