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
}
if ($memberRoute === "login") {
    $member = new member;
    $member->login();
}
