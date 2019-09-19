<?php
require_once 'header.php';

$_SESSION['NoValue'] = "";
try {
    loginRootCheck();
    $CommodityID = htmlspecialchars($_GET["CommodityID"]);
    $commodityName = htmlspecialchars($_POST["commodityName"]);
    $commodityStock = htmlspecialchars($_POST["commodityStock"]);
    $commodityPrice = htmlspecialchars($_POST["commodityPrice"]);
    $commodityRemarks = htmlspecialchars($_POST["commodityRemarks"]);
    $commodityPhoto = $_FILES['commodityPhoto']['tmp_name'];
    $checkPhoto = "";

    $photoType = $_FILES['commodityPhoto']['size']>0?$_FILES['commodityPhoto']['type']:"image/jpeg";
    
    if ($photoType === "image/jpeg") {
        if ($commodityPhoto != "") {
            $fp = fopen($commodityPhoto, 'r');
            $fileContent = fread($fp, filesize($commodityPhoto));
            $file_uploads = "data:image/jpeg;base64," . base64_encode($fileContent);
            $checkPhoto = ", photo = :photo";
        }


        if ($commodityName == "" || $commodityStock == "" || $commodityPrice == "") { //判斷是否空值
            $_SESSION['NoValue'] = "品名 價格 數量不得為空值";
            header("location:edit.php?CommodityID=$CommodityID");
        } else { //送入資料庫
            $sql = "UPDATE commodity SET name=:name, stock = :stock, price = :price, commodityRemarks = :commodityRemarks $checkPhoto where CommodityID = :CommodityID";
            $result = $db->prepare($sql);
            $result->bindValue(':CommodityID', $CommodityID);
            $result->bindValue(':name', $commodityName);
            $result->bindValue(':stock', $commodityStock);
            $result->bindValue(':price', $commodityPrice);
            $result->bindValue(':commodityRemarks', $commodityRemarks);

            if ($commodityPhoto != "") {
                $result->bindValue(':photo', $file_uploads);
            }



            $result->execute();

            header("location:index.php");
        }
    } else {
        header("location:index.php");
    }
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}
