<?php
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

$smarty->display('index.html');