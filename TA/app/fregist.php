<?php
function isRegisteredAdmin($setValue, $PDO_USED) { // Apakah pengguna sudah registrasi?
    $stateResult = $PDO_USED->prepare("SELECT usernameKaryawan FROM karyawan WHERE usernameKaryawan = :bindVar1 ;");
    $stateResult->bindValue(":bindVar1", $setValue);
    $stateResult->execute();
    if ($stateResult->rowCount() >= 1) {
        $GLOBALS['failRegist'] = TRUE;
        return "<span style='color: red;'>Nama pengguna sudah didaftarkan. Silahkan ditambakan atau ganti nama pengguna yang belum didaftarkan.</span>";
    } else { return; }
}
function isRegisteredCustomer($setValue, $PDO_USED) { // Apakah pengguna sudah registrasi?
    $stateResult = $PDO_USED->prepare("SELECT emailPelanggan FROM customers WHERE emailPelanggan = :bindVar1 ;");
    $stateResult->bindValue(":bindVar1", $setValue);
    $stateResult->execute();
    if ($stateResult->rowCount() >= 1) {
        $GLOBALS['failRegist'] = TRUE;
        return "<span style='color: red;'>Nama pengguna sudah didaftarkan. Silahkan ditambakan atau ganti nama pengguna yang belum didaftarkan.</span>";
    } else { return; }
}

function isSetValue($methodSend,$inValue) { // $methodSend adalah POST, GET, maupun HEAD ; $inValue adalah key dari suatu $methodSend
    if (!isset($methodSend[$inValue]) || ($methodSend[$inValue] == "")) { // Apakah bidang ini kosong?
        $GLOBALS['failRegist'] = TRUE;
        return "<span style='color: red;'>Seharusnya wajib diisi</span>";
    } else {
        return validatingValue($methodSend,$inValue);
    }
}
function validatingValue($methodSend, $inValue) { // Mengabsahan/validasi suatu isian
    switch($inValue) {
        case 'adminusr':
            if (!preg_match("/^[a-zA-Z0-9]+$/", $methodSend[$inValue])) {
                $GLOBALS['failRegist'] = TRUE;
                return "<span style='color: red;'>Nama pengguna hanya huruf dan/atau angka</span>";
            } else {
                break;
            }
        case 'adminpwd':
            if (strlen($methodSend[$inValue]) < 8 || (strlen($methodSend[$inValue]) > 99)) {
                $GLOBALS['failRegist'] = TRUE;
                return "<span style='color: red;'>Kata sandi kurang dari 8 karakter.<br/>Terlalu banyak karakter akan bingung untuk Qiqi</span>";
            } else if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.]).{8,}$/", $methodSend[$inValue])) {
                $GLOBALS['failRegist'] = TRUE;
                return "<span style='color: red;'>Kata sandi seminimal ada huruf kecil, besar, angka, dan simbol tertentu.</span>";
            } else {
                break;
            }
        case 'customerEmail':
            if (!filter_var($methodSend[$inValue], FILTER_VALIDATE_EMAIL)) {
                $GLOBALS['failRegist'] = TRUE;
                return "<span style='color: red;'>Surel tidak absah/valid. Kadang @localhost tidak diizinkan.</span>";
            } else {
                break;
            }
        case 'customerpwd':
            if (strlen($methodSend[$inValue]) < 8) {
                $GLOBALS['failRegist'] = TRUE;
                return "<span style='color: red;'>Kata sandi kuranag dari 8 karakter</span>";
            } else if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.]).{8,}$/", $methodSend[$inValue])) {
                $GLOBALS['failRegist'] = TRUE;
                return "<span style='color: red;'>Kata sandi seminimal ada huruf kecil, besar, angka, dan simbol tertentu.</span>";
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
        $stateExecute = $PDO_USED->prepare("INSERT INTO `karyawan` (`kodeJabatan`, `usernameKaryawan`, `passwordKaryawan`) VALUES (:admintitlecode, :adminusr, SHA2(:adminpwd , 256) );");
        $stateExecute->bindValue(":admintitlecode", $admintitlecode);
        $stateExecute->bindValue(":adminusr", $adminusr);
        $stateExecute->bindValue(":adminpwd", $adminpwd);
        $stateExecute->execute();
        header("Location: ".BASEURL."/app/admin/login.php");
        return exit();
    }
}
function isOKRegistCustomer($inFailRegist, $PDO_USED, $customerEmail, $customerpwd, $customeraddr) {
    if ($inFailRegist == TRUE) {
        return;
    } else {
        $stateExecute = $PDO_USED->prepare("INSERT INTO admin VALUES(:bindVal1 , :bindVal2 , SHA2( :bindVal3 , 256));");
        $stateExecute->bindValue(":bindVal1", $customerEmail);
        $stateExecute->bindValue(":bindVal2", $customeraddr);
        $stateExecute->bindValue(":bindVal3", $customerpwd);
        $stateExecute->execute();
        header("Location: ".BASEURL."/app/customer/login.php");
        return exit();
    }
}