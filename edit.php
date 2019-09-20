<?php
require_once 'header.php';

$commodityID = $_GET["commodityID"];
loginRootCheck();


$result = $db->prepare("select * from commodity where commodityID = :commodityID");
$result->bindValue(':commodityID', $commodityID, PDO::PARAM_STR);
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
$smarty->assign('commodityID', $commodityID);
$smarty->assign('row', $row);
$smarty->display('edit.html');