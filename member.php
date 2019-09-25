<?php
require_once 'header.php';
/**
 * 會員相關
 */
class member extends contactDB
{
    /**
     * 這是登入
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
            //return false;
        }
        //return true;
    }
    public function logout()
    {
        return (session_destroy()) ? "1" : "9";
    }

    public function signUp($mail, $password)
    {
        try {
            $this->pdoContact();
            $sql = "INSERT INTO member (memberID, mail,PWD) VALUES ('', :mail, :password)";##送入資料庫
            $result = $this->db->prepare($sql);
            $result->bindValue(':mail', $mail);
            $result->bindValue(':password', MD5($password));
            $result->execute();
            return "1";
        } catch (PDOException $err) {
            $err->getMessage();
            return "0";
            
        }
    }
}
