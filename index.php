<?php
require_once 'header.php';
$memberMail = $_SESSION['memberMail'] ?? "";
$mail = $_SESSION['mail'] ?? "";
$memberID = $_SESSION['memberID'] ?? "";


$result = $db->prepare("select * from commodity where softDelete = 1
                        order by commodityID desc");
$result->execute();
$row = $result->fetchAll();
$smarty->assign('row', $row);
/**
 * 上方為顯示沒有被軟刪除的便當
 */
$result = $db->prepare("SELECT * FROM transaction 
                                    JOIN commodity 
                                    ON transaction.commodityID=commodity.commodityID 
                                    where memberID = :memberID
                                    order by time desc limit 3");
$result->bindValue(':memberID', $memberID);
$result->execute();
$rowTransaction = $result->fetchAll();
$smarty->assign('rowTransaction', $rowTransaction);
/**
 * 上面為個人訂單
 */
$result = $db->prepare("SELECT * FROM transaction 
                                    JOIN commodity 
                                    ON transaction.commodityID=commodity.commodityID 
                                    JOIN member 
                                    ON transaction.memberID=member.memberID
                                    order by time desc limit 15");
$result->execute();
$rowTransactionAll = $result->fetchAll();
$smarty->assign('rowTransactionAll', $rowTransactionAll);
/**
 * 上面為所有人訂單
 */
$smarty->assign('memberMail', $memberMail);
$smarty->assign('mail', $mail);
$smarty->display('index.html');
