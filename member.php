<?php
require_once 'header.php';
$memberRoute = htmlspecialchars($_POST["memberRoute"]);

class member extends contactDB
{
    function login()
    {
        $mail = htmlspecialchars($_POST["mail"]);
        $pwd = htmlspecialchars($_POST["password"]);
        try {
            loginPageCheck();
            $this->pdoContact();
            $result = $this->db->prepare("select * from member where mail = :mail && PWD = :PWD ");
            $result->bindValue(':mail', $mail, PDO::PARAM_STR);
            $result->bindValue(':PWD', MD5($pwd), PDO::PARAM_STR);
            $result->execute();
            $row = $result->fetch();
            $rowCount = $result->rowCount();


            if ($rowCount == 1 && !isset($_SESSION['memberID'])) {
                session_unset();
                $_SESSION['memberMail'] = $row["mail"];
                $_SESSION['memberID'] = $row["memberID"];
                echo "1";
            } else {
                $_SESSION['mail'] = $mail;
                echo "0";
            }
        } catch (PDOException $err) {
            echo "Error: " . $err->getMessage();
            exit();
        }
    }
    function logout()
    {
        if (session_destroy()) {
            echo "1";
        } else {
            echo "0";
        }
    }
    function signUp()
    {
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
                $this->pdoContact();
                $sql = "INSERT INTO member (memberID, mail,PWD) VALUES ('', :mail, :passwordCheck)";
                $result = $this->db->prepare($sql);
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
    }
}
if ($memberRoute === "login") {
    $member = new member;
    $member->login();
} else if ($memberRoute === "logout") {
    $member = new member;
    $member->logout();
} else if ($memberRoute === "signUp") {
    $member = new member;
    $member->signUp();
}
