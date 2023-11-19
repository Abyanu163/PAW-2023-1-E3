<?php
function checkAdminTable($PDO_USED) { // Cek isian dari baris tabel karyawan
    $stateResult = $PDO_USED->prepare("SELECT * FROM karyawan;");
    $stateResult->execute();
    if ($stateResult->rowCount() <= 0) { // Jika tidak ada, maka inilah pertama kali ke halaman registrasi
        $stateResult = NULL;
        return header("Location: ".BASEURL."/app/admin/register.php");
    } else {
        return;
    }
}
function checkCustomerTable($PDO_USED) { // Cek isian dari baris tabel pelanggan
    $stateResult = $PDO_USED->prepare("SELECT * FROM customers;");
    $stateResult->execute();
    if ($stateResult->rowCount() <= 0) { // Jika tidak ada, maka inilah pertama kali ke halaman registrasi
        $stateResult = NULL;
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
        $stateExecuting = NULL;
        return header ("Location: ".BASEURL."/app/admin/"); exit();
    } else {
        return "<span style='color: red;'>Autentikasi gagal. Apakah pengguna sudah terdaftar?</span><br/>
        <span>Jika belum daftar, maka silahkan ke halaman registrasi akun untuk manajer dan karyawan di
        <a href='".BASEURL."/app/admin/register.php' title='Pastikan sudah jadi karyawan/admin/manajer di tempat kami'>sini</a>.
        </span>";
    }
}
function authIn($PDO_USED, $customerEmail, $customerpwd) { // Autentikasi untuk pelanggan dengan menyertakan kode pelanggan agar dapat dipahami.
    $stateExecuting = $PDO_USED->prepare("SELECT `kodePelanggan` FROM `customers`
    WHERE `usernamePelanggan` = :bindVal1 AND `passwordPelanggan` = SHA2( :bindVal2 , 256) ");
    $stateExecuting->bindValue("bindVal1" , $customerEmail);
    $stateExecuting->bindValue("bindVal2" , $customerpwd);
    $stateExecuting->execute();
    $usrID = $stateExecuting->fetchAll(PDO::FETCH_ORI_FIRST);
    $rowCount = $stateExecuting->rowCount();
    if ($rowCount >= 1) {
        // session_start();
        $_SESSION['signedIn'] = TRUE;
        $_SESSION['userID'] = $usrID[0]['kodePelanggan'];
        $stateExecuting = NULL;
        return header ("Location: ".BASEURL."/"); exit();
    } else {
        return "<div>
        <span style='color: red;'>Autentikasi gagal. Pastikan ingat surel dan kata sandi</span>
        </div>
        <div>
        <span>Kehilangan kata sandi? <a href='".BASEURL."/app/customer/lostpwd.php'>Klik atau tekan tautan ini</a> untuk reset kata sandi.</span>
        </div>";
    }
}
function managerAuthRedirect($rolebased) { // Jika ditemukan sebagai manajer
    if ($rolebased == 2) {
        return header("Location: ".BASEURL."/app/manager"); exit();
    }
}
function matchingCustomerResetPWD($PDO_USED, $customerEmail, $newCustomerPWD, $confirmNewCustomerPWD) { // Reset kata sandi buat pelanggan atau konsumer
    $failResetCustomPWD = FALSE;
    $stateExecuting = $PDO_USED->prepare("SELECT `kodePelanggan` FROM `customers`
    WHERE `usernamePelanggan` = :bindVal1");
    $stateExecuting->bindValue("bindVal1" , $customerEmail);
    $stateExecuting->execute();
    $rowCount = $stateExecuting->rowCount();
    if ($rowCount != 1) { // Cek apakah surel ini cuma satu yang ketemu
        $failResetCustomPWD = TRUE;
        echo "<div><span style='color: red;'>Surel tidak ketemu.<br/><i>HATI-HATI! BISA SAJA TIDAK AMAN JIKA CEROBOH DALAM URUSAN PRIVASI</i></span></div>";
    }
    if ($newCustomerPWD != $confirmNewCustomerPWD) { // Persaman kata sandi direset dengan konfirmasi kata sandi direset
        return "<div><span style='color: red;'>Gagal dalam konfirmasi ulang kata sandi tidak sama</span></div>";
    } else if ($failResetCustomPWD == TRUE) {
        return;
    } else {
        return customerResetPWD($PDO_USED, $customerEmail, $newCustomerPWD); // Jika OK, jalankan eksekusi reset kata sandi
    }
}
function customerResetPWD($PDO_USED, $customerEmail, $newCustomerPWD) { // Sekarang eksekusi reset kata sandi
    $stateExecuting = $PDO_USED->prepare("UPDATE `customers` SET `passwordPelanggan` = SHA2(:bindVal2 , 256) WHERE `customerEmail` = :bindVal1");
    $stateExecuting->bindValue("bindVal2", $newCustomerPWD);
    $stateExecuting->bindValue("bindVal1", $customerEmail);
    $stateExecuting->execute();
    $stateExecuting = NULL;
    return header("Location: ".BASEURL."/app/customer/login.php"); // Balik ke halaman masuk
    exit();
}
function matchingAdminResetPWD($PDO_USED, $adminusr, $newAdminPWD, $confirmNewAdminPWD) { // Reset kata sandi buat manajer dan admin + karyawan
    $failResetCustomPWD = FALSE;
    $stateExecuting = $PDO_USED->prepare("SELECT `kodeKaryawan` FROM `karyawan`
    WHERE `usernameKaryawan` = :bindVal1");
    $stateExecuting->bindValue("bindVal1" , $adminusr);
    $stateExecuting->execute();
    $rowCount = $stateExecuting->rowCount();
    if ($rowCount != 1) { // Cek apakah surel ini cuma satu yang ketemu
        $failResetCustomPWD = TRUE;
        echo "<div><span style='color: red;'>Nama pengguna tidak ketemu.<br/><i>HATI-HATI! BISA SAJA TIDAK AMAN JIKA CEROBOH DALAM URUSAN PRIVASI</i></span></div>";
    }
    if ($newAdminPWD != $confirmNewAdminPWD) { // Persaman kata sandi direset dengan konfirmasi kata sandi direset
        return "<div><span style='color: red;'>Gagal dalam konfirmasi ulang kata sandi tidak sama</span></div>";
    } else if ($failResetCustomPWD == TRUE) {
        return;
    } else {
        return adminResetPWD($PDO_USED, $adminusr, $newAdminPWD); // Jika OK, jalankan eksekusi reset kata sandi
    }
}
function adminResetPWD($PDO_USED, $adminusr, $newAdminPWD) { // Sekarang eksekusi reset kata sandi
    $stateExecuting = $PDO_USED->prepare("UPDATE `karyawan` SET `passwordKaryawan` = SHA2(:bindVal2 , 256) WHERE `usernameKaryawan` = :bindVal1");
    $stateExecuting->bindValue("bindVal2", $newAdminPWD);
    $stateExecuting->bindValue("bindVal1", $adminusr);
    $stateExecuting->execute();
    $stateExecuting = NULL;
    return header("Location: ".BASEURL."/app/admin/login.php"); // Balik ke halaman masuk
    exit();
}
?>