<?php
function checkAdminTable($PDO_USED) { // Cek isian dari baris tabel karyawan
    $stateResult = $PDO_USED->prepare("SELECT * FROM karyawan;");
    $stateResult->execute();
    if ($stateResult->rowCount() <= 0) { // Jika tidak ada, maka inilah pertama kali ke halaman registrasi
        return header("Location: ".BASEURL."/app/admin/register.php");
    } else {
        return;
    }
    return;
}
function checkCustomerTable($PDO_USED) { // Cek isian dari baris tabel pelanggan
    $stateResult = $PDO_USED->prepare("SELECT * FROM customers;");
    $stateResult->execute();
    if ($stateResult->rowCount() <= 0) { // Jika tidak ada, maka inilah pertama kali ke halaman registrasi
        return header("Location: ".BASEURL."/app/admin/register.php");
    } else {
        return;
    }
    return;
}
function checkSignIn($checking) { // Fungsi untuk mengecek kondisi sudah masuk
    return isset($checking);
}
function adminAuth($PDO_USED, $adminusr, $adminpwd) { // Autentikasi untuk admin (manajer + karyawan)
    $stateExecuting = $PDO_USED->prepare("SELECT `karyawan`.`kodeJabatan` FROM `karyawan`, `jabatan`
    WHERE `karyawan`.`kodeJabatan` = `jabatan`.`kodeJabatan` AND `usernameKaryawan` = :bindVal1 AND `passwordKaryawan` = SHA2(:bindVal2, 256);");
    $stateExecuting->bindValue("bindVal1" , $adminusr);
    $stateExecuting->bindValue("bindVal2" , $adminpwd);
    $stateExecuting->execute();
    $roleCode = $stateExecuting->fetchAll(PDO::FETCH_ORI_FIRST);
    $rowCount = $stateExecuting->rowCount();
    if ($rowCount >= 1) {
        // session_start();
        $_SESSION['adminSignIn'] = TRUE;
        $_SESSION['roleCode'] = $roleCode[0]['kodeJabatan'];
        return header ("Location: ".BASEURL."/app/admin/"); exit();
    } else {
        return "<span style='color: red;'>Autentikasi gagal. Apakah pengguna sudah terdaftar?</span><br/>
        <span>Jika belum daftar, maka silahkan ke halaman registrasi akun untuk manajer dan karyawan di
        <a href='".BASEURL."/app/admin/register.php' title='Pastikan sudah jadi karyawan/admin/manajer di tempat kami'>sini</a>.
        </span>";
    }
}
function authIn($PDO_USED, $customerEmail, $customerpwd) { // Autentikasi untuk pelanggan dengan menyertakan kode pelanggan agar dapat dipahami.
    $stateExecuting = $PDO_USED->prepare("SELECT `customerID` FROM `customers`
    WHERE `customerEmail` = :bindVal1 AND `customerPassword` = SHA2( :bindVal2 , 256) ");
    $stateExecuting->bindValue("bindVal1" , $customerEmail);
    $stateExecuting->bindValue("bindVal2" , $customerpwd);
    $stateExecuting->execute();
    $usrID = $stateExecuting->fetchAll(PDO::FETCH_ORI_FIRST);
    $rowCount = $stateExecuting->rowCount();
    if ($rowCount >= 1) {
        // session_start();
        $_SESSION['signedIn'] = TRUE;
        $_SESSION['userID'] = $roleCode[0]['usrID'];
        return header ("Location: ".BASEURL."/"); exit();
    } else {
        return "<span style='color: red;'>Autentikasi gagal. Pastikan ingat surel dan kata sandi</span>";
    }
}
function managerAuthRedirect($rolebased) { // Jika ditemukan sebagai manajer
    if ($rolebased == 2) {
        return header("Location: ".BASEURL."/app/manager"); exit();
    }
}
?>