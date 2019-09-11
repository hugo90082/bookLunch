<?php
require_once 'header.php';
$mail = htmlspecialchars($_POST["mail"]);
$pwd = htmlspecialchars($_POST["password"]);



try {
    loginPageCheck();

    $result = $db->prepare("select * from member where mail = :mail && PWD = :PWD ");
    $result->bindValue(':mail', $mail, PDO::PARAM_STR);
    $result->bindValue(':PWD', MD5($pwd), PDO::PARAM_STR);
    $result->execute();
    $row = $result->fetch();
    $rowCount = $result->rowCount();


    if ($rowCount == 1 && !isset($_SESSION['memberID'])) {
        session_unset();
        $_SESSION['memberMail'] = $row["mail"];
        $_SESSION['memberID'] = $row["memberID"];
        echo true;
    } else {
        $_SESSION['mail'] = $mail;
        echo false;
    }
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
    exit();
}
