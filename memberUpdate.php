<?php
require_once 'header.php';

try {
    loginCheck();
    $passwordMemberManagement = htmlspecialchars($_POST["passwordMemberManagement"]);
    $newPasswordMemberManagement = htmlspecialchars($_POST["newPasswordMemberManagement"]);
    $newCheckPasswordMemberManagement = htmlspecialchars($_POST["newCheckPasswordMemberManagement"]);
    $memberID = $_SESSION['memberID'];
// $passwordMemberManagement = 1
    if ($passwordMemberManagement === "" || $newPasswordMemberManagement === "" || $newCheckPasswordMemberManagement === "") { ## 判斷是否空值
        echo "3";
    } else if ($newPasswordMemberManagement != $newCheckPasswordMemberManagement) {
        echo "2";
    } else { //送入資料庫
        $sql = "UPDATE member SET PWD=:newCheckPasswordMemberManagement 
                where memberID = :memberID and PWD = :passwordMemberManagement";
        $result = $db->prepare($sql);
        $result->bindValue(':memberID', $memberID);
        $result->bindValue(':passwordMemberManagement', MD5($passwordMemberManagement));
        $result->bindValue(':newCheckPasswordMemberManagement', MD5($newCheckPasswordMemberManagement));
        $result->execute();
        $rowCount = $result->rowCount();
        if ($rowCount === 1) {
            echo "1";
        } else {
            echo "4";
        }
    }
} catch (PDOException $err) {
    $err->getMessage();
    echo "0";
    exit();
}
