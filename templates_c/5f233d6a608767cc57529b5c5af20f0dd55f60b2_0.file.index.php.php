<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-18 07:46:03
  from 'C:\xampp\htdocs\bookLunch\index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d81c49b760593_91994929',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f233d6a608767cc57529b5c5af20f0dd55f60b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bookLunch\\index.php',
      1 => 1568253667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d81c49b760593_91994929 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
require_once 'header.php';

// 1. 連接資料庫伺服器

// 2. 執行 SQL 敘述
$result = $db->prepare("select * from commodity 
                        order by CommodityID desc limit 25 "); 
$result->execute();
// 3. 處理查詢結果 
// 4. 結束連線

$memberMail = $_SESSION['memberMail'] ?? "";
$mail = $_SESSION['mail'] ?? "";

$row = $result->fetchAll();



$smarty->assign('row', $row);
$smarty->assign('memberMail', $memberMail);
$smarty->assign('mail', $mail);

$smarty->display('index.html');<?php }
}
