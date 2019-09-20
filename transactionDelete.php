<?php
require_once 'header.php';

try {
    loginCheck();
    $memberID = $_SESSION['memberID'] ?? "";
    $commodityID = htmlspecialchars($_POST["commodityID"]);
    $transactionID = htmlspecialchars($_POST["transactionID"]);
    $memberIDCheck = htmlspecialchars($_POST["memberID"]);
    if ($memberID != $memberIDCheck) { ## 判斷是否空值
        echo "9";
    } else { ## 送入資料庫

        $sql = "DELETE FROM transaction WHERE transactionID = :transactionID and commodityID = :commodityID and memberID = :memberID";
        $result = $db->prepare($sql);
        $result->bindValue(':memberID', $memberID);
        $result->bindValue(':commodityID', $commodityID);
        $result->bindValue(':transactionID', $transactionID);

        $result->execute();

        echo "1";
    }
} catch (PDOException $err) {

    echo "Error: " . $err->getMessage();
}
