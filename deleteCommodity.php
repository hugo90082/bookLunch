<?php
require_once 'header.php';
$CommodityID = $_POST["CommodityID"];

try {
    loginRootCheck();

    $sql = "UPDATE Commodity SET softDelete = 0 where CommodityID = :CommodityID;";
    $result = $db->prepare($sql);
    $result->bindValue(':CommodityID', $CommodityID);
    $result->execute();

    echo "1";
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
    exit();
}
