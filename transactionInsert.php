<?php
require_once 'header.php';

try {
    loginCheck();
    $memberID = htmlspecialchars($_POST["memberID"]);
    $CommodityID = htmlspecialchars($_POST["CommodityID"]);
    $amount = htmlspecialchars($_POST["amount"]);
    $transactionRemarks = htmlspecialchars($_POST["transactionRemarks"]);
    $total = htmlspecialchars($_POST["total"]);
    $stock = htmlspecialchars($_POST["stock"]);


    if ($amount <= 0) { ## 判斷是否空值

        echo "2";
    } else { ## 送入資料庫

        $sql = "INSERT INTO transaction (memberID, CommodityID, amount, transactionRemarks, total) VALUES ( :memberID, :CommodityID, :amount, :transactionRemarks, :total);
        UPDATE commodity SET stock = :stock where CommodityID = :CommodityID;";
        $result = $db->prepare($sql);
        $result->bindValue(':memberID', $memberID);
        $result->bindValue(':CommodityID', $CommodityID);
        $result->bindValue(':amount', $amount);
        $result->bindValue(':transactionRemarks', $transactionRemarks);
        $result->bindValue(':total', $total);
        $result->bindValue(':stock', $stock-$amount);
        $result->execute();

        echo "1";
    }
} catch (PDOException $err) {

    echo "Error: " . $err->getMessage();
}
