<?php
function isRegisteredAdmin($setValue, $PDO_USED) { // Apakah pengguna sudah registrasi?
    $stateResult = $PDO_USED->prepare("SELECT usernameKaryawan FROM karyawan WHERE usernameKaryawan = :bindVar1 ;");
    $stateResult->bindValue(":binVar1", $setValue);
    $stateResult->execute();
    foreach ($stateResult as $keyRegist1 => $valueRegist1) {
        if ($keyRegist1[$valueRegist1] == $setValue) {
            $GLOBALS['failRegist'] = TRUE;
            return "Nama pengguna sudah didaftarkan. Silahkan ditambakan atau ganti nama pengguna yang belum didaftarkan.";
        } else { return; }
    }
}
function isRegisteredCustomer($setValue, $PDO_USED) { // Apakah pengguna sudah registrasi?
    $stateResult = $PDO_USED->prepare("SELECT emailPelanggan FROM customers WHERE emailPelanggan = :bindVar1 ;");
    $stateResult->bindValue(":binVar1", $setValue);
    $stateResult->execute();
    foreach ($stateResult as $keyRegist1 => $valueRegist1) {
        if ($keyRegist1[$valueRegist1] == $setValue) {
            $GLOBALS['failRegist'] = TRUE;
            return "Surel sudah didaftarkan. Silahkan ganti surel yang valid/absah yang belum didaftarkan di laman ini.";
        } else { return; }
    }
}

function isSetValue($methodSend,$inValue) { // $methodSend adalah POST, GET, maupun HEAD ; $inValue adalah key dari suatu $methodSend
    if (isset($methodSend[$inValue])) { // Apakah bidang ini kosong?
        $GLOBALS['failRegist'] = TRUE;
        return "Seharusnya wajib diisi";
    } else {
        return checkingValue($methodSend,$inValue);
    }
}
function validatingValue($methodSend, $inValue) { // Mengabsahan/validasi suatu isian
    switch($inValue) {
        case $inValue = 'adminusr':
            if (!preg_match("/^[a-zA-Z0-9]+$/", $methodSend[$inValue])) {
                $GLOBALS['failRegist'] = TRUE;
                return "Nama pengguna hanya huruf dan/atau angka";
            } else {
                break;
            }
        case $inValue = 'adminpwd':
            if (strlen($methodSend[$inValue]) < 8) {
                $GLOBALS['failRegist'] = TRUE;
                return "Kata sandi kuranag dari 8 karakter";
            } else if (strlen($$methodSend[$inValue]) > 99) {
                $GLOBALS['failRegist'] = TRUE;
                return "Terlalu banyak karakter kata sandi membuat kita bingung";
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#&*\.\-])$/", $methodSend[$inValue])) {
                $GLOBALS['failRegist'] = TRUE;
                return "Kata sandi seminimal ada huruf kecil, besar, angka, dan simbol tertentu.";
            } else {
                break;
            }
        case $inValue = 'customerEmail':
            if (!filter_var($methodSend[$inValue], FILTER_VALIDATE_EMAIL)) {
                $GLOBALS['failRegist'] = TRUE;
                return "Surel tidak absah/valid. Kadang @localhost tidak diizinkan.";
            } else {
                break;
            }
        case $inValue = 'customerpwd':
            if (strlen($methodSend[$inValue]) < 8) {
                $GLOBALS['failRegist'] = TRUE;
                return "Kata sandi kuranag dari 8 karakter";
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#&*\.\-])$/", $methodSend[$inValue])) {
                $GLOBALS['failRegist'] = TRUE;
                return "Kata sandi seminimal ada huruf kecil, besar, angka, dan simbol tertentu.";
            } else {
                break;
            }
        default:
            break;
    }; return;
}
// Eksekusi dan pastikan aman
function isOKRegistAdmin($inFailRegist, $PDO_USED, $adminusr, $adminpwd, $admintitlecode) {
    if ($inFailRegist == TRUE) {
        return;
    } else {
        $PDO_USED->prepare("INSERT INTO admin VALUES(:bindVal1 , :bindVal2 , SHA2( :bindVal3 , 256));");
        $PDO_USED->bindValue(":binVal1", $admintitlecode);
        $PDO_USED->bindValue(":binVal2", $adminusr);
        $PDO_USED->bindValue(":binVal3", $adminpwd);
        $PDO_USED->execute();
        header("Location: ".BASEURL."/app/admin/login.php");
        return exit();
    }
}
function isOKRegistCustomer($inFailRegist, $PDO_USED, $customerEmail, $customerpwd, $customeraddr) {
    if ($inFailRegist == TRUE) {
        return;
    } else {
        $PDO_USED->prepare("INSERT INTO admin VALUES(:bindVal1 , :bindVal2 , SHA2( :bindVal3 , 256));");
        $PDO_USED->bindValue(":binVal1", $customerEmail);
        $PDO_USED->bindValue(":binVal2", $customeraddr);
        $PDO_USED->bindValue(":binVal3", $customerpwd);
        $PDO_USED->execute();
        header("Location: ".BASEURL."/app/customer/login.php");
        return exit();
    }
}