<?php
require_once 'header.php';
$id = htmlspecialchars($_POST['msID']);
$topic = htmlspecialchars($_POST["topic"]);
$content = htmlspecialchars($_POST["content"]);
$memberID = htmlspecialchars($_POST["memberID"]);

try {
    loginCheck();

   if ($topic == "" || $content == "") { //判斷是否空值

        $_SESSION['NoValue'] = "標題或內容不得為空值";
        header("location:edit.php?ID=$id");
    } else if ($memberID != $_SESSION['memberID']) {

        echo "<script> alert('找無對應文章 將導回首頁'); window.location.replace('index.php');</script>";
    } else { //送入資料庫
        $sql = "UPDATE message SET topic=:topic, content = :content where ID = :ID and memberID = :memberID";
        $result = $db->prepare($sql);
        $result->bindValue(':ID', $id);
        $result->bindValue(':memberID', $memberID);
        $result->bindValue(':topic', $topic);
        $result->bindValue(':content', $content);
        $result->execute();

        header("location:index.php");
    }
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
    exit();
}
