<?php
require_once 'header.php';


$memberID = $mail = $_SESSION['memberID'] ?? "";

$result = $db->prepare("SELECT * FROM transaction 
                        JOIN commodity 
                        ON transaction.CommodityID=commodity.CommodityID 
                        where memberID = :memberID
                        order by time desc"); 
$result->bindValue(':memberID', $memberID);
$result->execute();
$rowTransaction = $result->fetchAll();
echo $rowTransaction;