<?php

function isSetField($fieldValue, $fieldInput) {
    if (!isset($fieldInput[$fieldValue])) {
        $GLOBALS['setOK'] = FALSE;
        return $fieldInput[$fieldValue];
    } else {
        return validSetField($fieldValue, $fieldInput);
    }
}
function validSetField($fieldValue, $fieldInput) {
    switch ($fieldInput) {
        case $fieldInput = 'admin_USE':
            if (!preg_match("/^[a-zA-Z0-9]+$/", $fieldValue)) {
                $GLOBALS['setOK'] = FALSE;
                return $fieldInput[$fieldValue];
            } else {
                break;
            }
        case $fieldInput = 'PWD_admin':
            if (strlen($fieldValue) < 8) {
                $GLOBALS['setOK'] = FALSE;
                return $fieldInput[$fieldValue];
            } else if (strlen($fieldValue) >= 99) {
                $GLOBALS['setOK'] = FALSE;
                return $fieldInput[$fieldValue];
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#&*\.\-])$/", $fieldValue)) {
                $GLOBALS['setOK'] = FALSE;
                return $fieldInput[$fieldValue];
            } else {
                break;
            }
        default:
            break;
    };
    if (!isset($GLOBALS['setOK'])) {
        $GLOBALS['setOK'] = TRUE;
    }
    return;
}
function requestCreateTableAdmin($setOK, $PDO_USED, $adminUser, $pwdAdmin, $titleCode) {
    if ($setOK == TRUE) {
        return insertOnTableAdmin($PDO_USED, $adminUser, $pwdAdmin, $titleCode);
    }
    return "<span>Registrasi admin gagal. Silahkan cek dan perbaiki yang salah.</span>";
}
function insertOnTableAdmin($PDO_USED, $adminUser, $pwdAdmin, $titleCode) {
    try {
        $stateResult = $PDO_USED->prepare("INSERT INTO karyawan
        VALUES ( :adminUser , SHA2( :pwdAdmin , 256) , :titleCode );
        ");
        $stateResult->bindValue(":adminUser", $adminUser);
        $stateResult->bindValue(":pwdAdmin", $pwdAdmin);
        $stateResult->bindValue(":titleCode", $titleCode);
        $stateResult->execute();
    } catch (PDOException $e) {
        return "<span>Gagal dalam menjalankan kueri: {$e->getMessage()}</span>";
    }
    return header("Location: ".BASEURL."/app/admin/login.php");
}

?>