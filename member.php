<?php
require_once 'header.php';
/**
 * 
 */
class member extends contactDB
{
    /**
     * 
     */
    public function login($mail, $pwd)
    {
        try {
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
                return "1";
            } else if (isset($_SESSION['memberID'])) {
                return "2";
            } else {
                $_SESSION['mail'] = $mail;
                return "0";
            }
        } catch (PDOException $err) {
            $err->getMessage();
            return "9";
            exit();
        }
    }
    public function logout()
    {
        if (session_destroy()) {
            return "1";
        } else {
            return "9";
        }
    }
    public function signUp($mail, $password, $passwordCheck)
    {
        try {
            if ($mail == "" || $password == "" || $passwordCheck == "") { ##判斷是否空值
                return "2";
            } else if ($password != $passwordCheck) { ##判斷密碼不同
                return "3";
            } else { ##送入資料庫
                $this->pdoContact();
                $sql = "INSERT INTO member (memberID, mail,PWD) VALUES ('', :mail, :passwordCheck)";
                $result = $this->db->prepare($sql);
                $result->bindValue(':mail', $mail);
                $result->bindValue(':passwordCheck', MD5($passwordCheck));
                $result->execute();
                return "1";
            }
        } catch (PDOException $err) {

            $err->getMessage();
            return "0";
            exit();
        }
    }
}
