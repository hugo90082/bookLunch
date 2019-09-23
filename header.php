<?php
require_once 'check.php';
/**
 * Example Application
 *
 * @package Example-application
 */
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: *");
// header("Access-Control-Allow-Headers:x-requested-with,content-type");

ini_set("display_errors", "On");
require './libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

header("content-type:text/html; charset=utf-8");
session_start();
class contactDB{
    function pdoContact(){
        $this->db = new PDO("mysql:host=localhost;dbname=book_lunch;port=3306", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("SET CHARACTER SET utf8");
    }
}
$db = new PDO("mysql:host=localhost;dbname=book_lunch;port=3306", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("SET CHARACTER SET utf8");
