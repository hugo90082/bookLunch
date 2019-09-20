<?php
require_once 'header.php';
$commodityID = $_POST["commodityID"];

try {
    loginRootCheck();

    $sql = "UPDATE commodity SET softDelete = 0 where commodityID = :commodityID;";
    $result = $db->prepare($sql);
    $result->bindValue(':commodityID', $commodityID);
    $result->execute();

    echo "1";
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
    exit();
}
