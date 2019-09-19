<?php
require_once 'header.php';

$_SESSION['NoValue'] = "";
try {
    loginRootCheck();
    $commodityName = htmlspecialchars($_POST["commodityName"]);
    $commodityStock = htmlspecialchars($_POST["commodityStock"]);
    $commodityPrice = htmlspecialchars($_POST["commodityPrice"]);
    $commodityRemarks = htmlspecialchars($_POST["commodityRemarks"]);
    $commodityPhoto = $_FILES['commodityPhoto']['tmp_name'];
    $photoType = $_FILES['commodityPhoto']['type'];
    if ($photoType === "image/jpeg") {
        $fp = fopen($commodityPhoto, 'r');
        $fileContent = fread($fp, filesize($commodityPhoto));
        $file_uploads = "data:image/jpeg;base64," . base64_encode($fileContent);

        if ($commodityName == "" || $commodityStock == "" || $commodityPrice == "") { //判斷是否空值
            $_SESSION['NoValue'] = "品名 價格 數量不得為空值";
            header("location:create.php");
        } else { //送入資料庫

            $sql = "INSERT INTO commodity (CommodityID, name, stock, price, commodityRemarks, photo) VALUES ('', :name, :stock, :price, :commodityRemarks, :photo)";
            $result = $db->prepare($sql);
            $result->bindValue(':name', $commodityName);
            $result->bindValue(':stock', $commodityStock);
            $result->bindValue(':price', $commodityPrice);
            $result->bindValue(':commodityRemarks', $commodityRemarks);
            $result->bindValue(':photo', $file_uploads);
            $result->execute();

            header("location:index.php");
        }
    } else {
        header("location:index.php");
    }
} catch (PDOException $err) {

    echo "Error: " . $err->getMessage();
}
