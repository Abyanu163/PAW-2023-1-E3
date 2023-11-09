<?php

function checkAdminTable($PDO_USED) {
    $stateResult = $PDO_USED->prepare("SHOW TABLES LIKE admin");
    $stateResult->execute();
    if ($stateResult->fetchAll() == []) {
        return header("Location: ".BASEURL."/app/admin/register.php");
    }
    return;
}
function isSetField($fieldValue, $fieldInput) {
    if (!isset($fieldValue)) {
        $GLOBALS['setOK'] = FALSE;
        return;
    } else {
        return validSetField($fieldValue, $fieldInput);
    }
}
function validSetField($fieldValue, $fieldInput) {
    switch ($fieldInput) {
        case $fieldInput = 'admin_USE':
            if (!preg_match("/^[a-zA-Z0-9]+$/", $fieldValue)) {
                $GLOBALS['setOK'] = FALSE;
            } else {
                break;
            }
        case $fieldInput = 'PWD_admin':
            if (strlen($fieldValue) < 8) {
                $GLOBALS['setOK'] = FALSE;
                return;
            } else if (strlen($fieldValue) >= 99) {
                $GLOBALS['setOK'] = FALSE;
                return;
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#&*\.\-])$/", $fieldValue)) {
                $GLOBALS['setOK'] = FALSE;
                return;
            } else {
                break;
            }
        default:
            break;
    };
    return;
}
function requestCreateTableAdmin($setOK, $PDO_USED, $adminUser, $pwdAdmin) {
    if ($setOK == TRUE) {
        try {
            $stateResult = $PDO_USED->prepare("CREATE admin (
                admin_user varchar(64) UNIQUE NOT NULL;
                passwd_admin varchar(300) NOT NULL; 
            )");
            $stateResult->execute();
        } catch (PDOException $e) {
            return header("Location: ".BASEURL."/app/admin/register.php");
        }
        return insertOnTableAdmin($PDO_USED, $adminUser, $pwdAdmin);
    }
}
function insertOnTableAdmin($PDO_USED, $adminUser, $pwdAdmin) {
    try {
        $stateResult = $PDO_USED->prepare("INSERT INTO admin
        VALUES ( :adminUser , SHA2( :pwdAdmin , 256) );
        ");
        $stateResult->bindValue(":adminUser", $adminUser);
        $stateResult->bindValue(":pwdAdmin", $pwdAdmin);
        $stateResult->execute();
    } catch (PDOException $e) {
        return header("Location: ".BASEURL."/app/admin/register.php");
    }
    return header("Location: ".BASEURL."/app/admin/login.php");
}

?>