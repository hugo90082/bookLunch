<?php
require_once 'header.php';

try {
    loginCheck();
    $memberID = $_SESSION['memberID'] ?? "";
    $commodityID = htmlspecialchars($_POST["commodityID"]);
    $amount = htmlspecialchars($_POST["amount"]);
    $transactionRemarks = htmlspecialchars($_POST["transactionRemarks"]);
    $total = htmlspecialchars($_POST["total"]);
    $stock = htmlspecialchars($_POST["stock"]);
    $subTotal = $stock - $amount;
    $memberIDCheck = htmlspecialchars($_POST["memberID"]);
    if ($amount <= 0) { ## 判斷是否空值
        echo "2";
    } else if ($memberID != $memberIDCheck) {
        echo "9";
    } else if ($subTotal < 0) { ## 判斷存貨數量
        echo "3";
    } else { ## 送入資料庫
        $sql = "INSERT INTO transaction (memberID, commodityID, amount, transactionRemarks, total) VALUES ( :memberID, :commodityID, :amount, :transactionRemarks, :total);
        UPDATE commodity SET stock = :stock where commodityID = :commodityID;";
        $result = $db->prepare($sql);
        $result->bindValue(':memberID', $memberID);
        $result->bindValue(':commodityID', $commodityID);
        $result->bindValue(':amount', $amount);
        $result->bindValue(':transactionRemarks', $transactionRemarks);
        $result->bindValue(':total', $total);
        $result->bindValue(':stock', $subTotal);
        $result->execute();
        echo "1";
    }
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}
