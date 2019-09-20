<?php
require_once 'header.php';

// 1. 連接資料庫伺服器

// 2. 執行 SQL 敘述
$result = $db->prepare("select * from commodity where softDelete = 1
                        order by commodityID desc"); 
$result->execute();
// 3. 處理查詢結果 
// 4. 結束連線

$memberMail = $_SESSION['memberMail'] ?? "";
$mail = $_SESSION['mail'] ?? "";
$memberID = $_SESSION['memberID'] ?? "";

$row = $result->fetchAll();
$smarty->assign('row', $row);

$result = $db->prepare("SELECT * FROM transaction 
                                    JOIN commodity 
                                    ON transaction.commodityID=commodity.commodityID 
                                    where memberID = :memberID
                                    order by time"); 
$result->bindValue(':memberID', $memberID);
$result->execute();
$rowTransaction = $result->fetchAll();
$smarty->assign('rowTransaction', $rowTransaction);
$smarty->assign('memberMail', $memberMail);
$smarty->assign('mail', $mail);

$smarty->display('index.html');