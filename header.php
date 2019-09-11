<?php

/**
 * Example Application
 *
 * @package Example-application
 */
ini_set("display_errors", "On");
require './libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

header("content-type:text/html; charset=utf-8");
session_start();

$db = new PDO("mysql:host=localhost;dbname=book_lunch;port=3306", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("SET CHARACTER SET utf8");

function loginCheck()
{
    if (isset($_SESSION['memberID'])) {
        return true;
    } else {
        echo "<script> alert('尚未登入'); window.location.replace('login.php');</script>";
        exit;
    }
}
function loginPageCheck()
{
    if (!isset($_SESSION['memberID'])) {
        return true;
    } else {
        echo "<script> alert('已登入'); window.location.replace('index.php');</script>";
        exit;
    }
}
