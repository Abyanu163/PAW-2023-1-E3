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
        return header("Location: ".BASEURL."/app/customer/register.php");
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
function authIn($PDO_USED, $customerEmail, $customerpwd, $remember) { // Autentikasi untuk pelanggan dengan menyertakan kode pelanggan agar dapat dipahami.
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
        if ($remember == 'on') {
            setcookie("userID", $usrID[0]['kodePelanggan'], time() + (60 * 60 * 24 * 30), "/"); // 60 dtk, 60 mnt, 24 jam, 30 hari
        }
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
function rememberMe() { // Centang mengingat. HTML centang $_POST['remember'] = 'on' . HTML tidak centang tidak ada $_POST['remember']
    $remember = $_POST['remember'] ?? false;
    if ($remember != FALSE) {echo htmlspecialchars("checked"); return;}
    return;
}
function getUserData($PDO_USED, $userID) { // Ambil salah satu data pengguna pelanggan untuk diubah
    $stateExecute = $PDO_USED->prepare("SELECT `kodePelanggan`, `usernamePelanggan`, `alamatPelanggan` FROM `customers` WHERE `kodePelanggan` = :getUserID");
    $stateExecute->bindValue(":getUserID", $userID); // JANGAN MENAMPILKAN KATA SANDI DI KUERI INI
    $stateExecute->execute();
    $GLOBALS['UIDFetched'] = $stateExecute->fetch(PDO::FETCH_ASSOC);
    return $stateExecute = NULL;
}
function setted($METHOD, $arrayIn) { // apakah ini sudah diisi?
    if (!isset($METHOD[$arrayIn]) or $METHOD[$arrayIn] == "" or $METHOD[$arrayIn] == NULL) {
        $GLOBALS['failUpdate'] = TRUE;
        return "<span style='color: red;'>Harusnya diisi</span>";
    }
    return validatingUpdate($METHOD, $arrayIn); // Sudah terisi, cek...
}
function validatingUpdate($METHOD, $arrayIn) { //... di sini
    switch($arrayIn) {
        case 'adminusr':
            if (!preg_match("/^[a-zA-Z0-9]+$/", $METHOD[$arrayIn])) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Nama pengguna hanya huruf dan/atau angka</span>";
            } else {
                break;
            }
        case 'adminpwd':
            if (strlen($METHOD[$arrayIn]) < 8 || (strlen($METHOD[$arrayIn]) > 99)) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Kata sandi kurang dari 8 karakter.<br/>Atau terlalu banyak karakter akan bingung untuk Qiqi</span>";
            } else if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.]).{8,}$/", $METHOD[$arrayIn])) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Kata sandi seminimal ada huruf kecil, besar, angka, dan simbol tertentu.</span>";
            } else {
                break;
            }
        case 'confirmAdminPwd':
            if ($METHOD[$arrayIn] != $_POST['adminpwd']) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Konfirmasi kata sandi tidak sama</span>";
            }
        case 'customerEmail':
            $surel = $GLOBALS['UIDFetched']['usernamePelanggan'] ?? FALSE;
            if ($METHOD[$arrayIn] == $surel && $surel != FALSE) {
                break;
            }
            if (!filter_var($METHOD[$arrayIn], FILTER_VALIDATE_EMAIL)) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Surel tidak absah/valid. Kadang @localhost tidak diizinkan.</span>";
            } else {
                break;
            }
        case 'customerpwdNEW':
            if (strlen($METHOD[$arrayIn]) < 8) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Kata sandi kuranag dari 8 karakter</span>";
            } else if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.]).{8,}$/", $METHOD[$arrayIn])) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Kata sandi seminimal ada huruf kecil, besar, angka, dan simbol tertentu.</span>";
            } else {
                break;
            }
        case 'customerpwdOLD':
            $PDO_USED = PDO_Connect;
            $getUserID = $_SESSION['userID'] ?? $_COOKIE['userID'] ?? FALSE;
            $stateExecute = $PDO_USED->prepare("SELECT `kodePelanggan` FROM `customers`
            WHERE `kodePelanggan` = :bindValue1 AND `passwordPelanggan` = SHA2( :bindValue2 , 256)");
            $stateExecute->bindValue(":bindValue1", $getUserID);
            $stateExecute->bindValue(":bindValue2", $METHOD[$arrayIn]);
            $stateExecute->execute();
            if ($stateExecute->rowCount() < 1) {
                $GLOBALS['failUpdate'] = TRUE;
                return "<span style='color: red;'>Sayangnya salah. Apa lupa kata sandi lama? Qiqi sering begitu.</span><br/>
                <span>Jika lupa kata sandi, klik <a href='".BASEURL."/app/customer/lostpwd.php' title='PASTIKAN BENAR-BENAR PEMILIK AKUN'>di sini</a>.</span>";
            }
        default:
            break;
    }; return;
}
// Muktahirkan data pengguna pelanggan dan memastikan dalam keadaan sah/valid untuk syarat eksekusi...
function updateUserData($inFailUpdate, $PDO_USED, $userID, $customerEmail, $customerpwd, $customeraddr) {
    if ($inFailUpdate == TRUE) {
        return;
    } else { // ...muktahir data pengguna pelanggan
        $stateExecute = $PDO_USED->prepare("UPDATE `customers` SET `usernamePelanggan` = :bindVar4, `alamatPelanggan` = :bindVar1, `passwordPelanggan` = SHA2( :bindVar2 , 256) WHERE `kodePelanggan` = :bindVar3");
        $stateExecute->bindValue(":bindVar1", $customeraddr);
        $stateExecute->bindValue(":bindVar2", $customerpwd);
        $stateExecute->bindValue(":bindVar3", $userID);
        $stateExecute->bindValue(":bindVar4", $customerEmail);
        $stateExecute->execute();
        $stateExecute = NULL;
        return "<span style='color: green;'>Data pengguna sudah diperbarui. Pastikan mengingat kata sandi yang sudah diperbarukan.</span>";
    }
}

// Untuk redirect yang tidak ada akun?
function checkSignedIn() { // untuk pelanggan
    $signedIn = $_SESSION['signedIn'] ?? false;
    $savedSignedIn = $_COOKIE['userIDSaved'] ?? false;
    if ($signedIn == FALSE) {
        if ($savedSignedIn != FALSE) {
            $_SESSION['signedIn'] = $savedSignedIn;
        } else {
            header('Location: '.BASEURL.'/app/customer/login.php');
        }
    }
}
function checkAdminSignedIn() { // untuk admin
    $adminSignIn = $_SESSION['adminSignIn'] ?? false;
    if ($adminSignIn == FALSE) {
        header('Location: '.BASEURL.'/app/admin/login.php');
    }
}
// Semisal nih untuk manajer
function whenIsManager() {
    $roleCode = $_SESSION['roleCode'] ?? false;
    if ($roleCode == 2) {
        header('Location: '.BASEURL.'/app/manager');
    }
}

// Keluar dari akun ...
function signOut () {
    $signOut = $_GET['authSign'] ?? false;
    if ($signOut == 'Redirect_Sign_Out_Enabled') {
        unset($_SESSION['signedIn']);
        setcookie("userIDSaved", "", time() - 9999, "/");
        header ('Location: '.BASEURL);
        return exit();
    };
}
?>