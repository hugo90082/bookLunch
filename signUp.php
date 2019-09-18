<?php
require_once 'header.php';

$mail = htmlspecialchars($_POST["mail"]);
$password = htmlspecialchars($_POST["password"]);
$passwordCheck = htmlspecialchars($_POST["passwordCheck"]);

try {
    loginPageCheck();
    if ($mail == "" || $password == "" || $passwordCheck == "") { //判斷是否空值

        echo "2";
    } else if ($password != $passwordCheck) {

        echo "3";
    } else { //送入資料庫

        $sql = "INSERT INTO member (memberID, mail,PWD) VALUES ('', :mail, :passwordCheck)";
        $result = $db->prepare($sql);
        $result->bindValue(':mail', $mail);
        $result->bindValue(':passwordCheck', MD5($passwordCheck));
        $result->execute();
        echo "1";
    }
} catch (PDOException $err) {
    //echo "Error: " . 
    $err->getMessage();
    echo "0";
    exit();
}
