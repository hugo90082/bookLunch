<?php
require_once 'header.php';

$CommodityID = $_GET["CommodityID"];
loginRootCheck();


$result = $db->prepare("select * from commodity where CommodityID = :CommodityID");
$result->bindValue(':CommodityID', $CommodityID, PDO::PARAM_STR);
$result->execute();
$row = $result->fetch();
$rowCount = $result->rowCount();

if ($rowCount == 0) {
    echo "<script> alert('找無對應文章 將導回首頁'); window.location.replace('index.php');</script>";
} else {
    $rowCount = $result->rowCount();
}

$NoValue = isset($_SESSION['NoValue']) ? $_SESSION['NoValue'] : "<br>";

$smarty->assign('NoValue', $NoValue);
unset($_SESSION['NoValue']);
$smarty->assign('CommodityID', $CommodityID);
$smarty->assign('row', $row);
$smarty->display('edit.html');