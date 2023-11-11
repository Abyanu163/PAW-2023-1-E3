<?php
function checkAdminTable($PDO_USED) {
    $stateResult = $PDO_USED->prepare("SELECT * FROM karyawan;");
    $stateResult->execute();
    if ($statement->rowCount() <= 0) {
        return header("Location: ".BASEURL."/app/admin/register.php");
    }
    return;
}
?>