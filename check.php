<?php

function loginCheck()
{
    if (isset($_SESSION['memberID'])) {
        return true;
    } else {
        echo "<script> alert('尚未登入'); window.location.replace('index.php');</script>";
        exit;
    }
}
function loginRootCheck()
{
    if (isset($_SESSION['memberID']) && $_SESSION['memberID'] == 1) {
        return true;
    } else {
        echo "<script> alert('並非管理者'); window.location.replace('index.php');</script>";
        exit;
    }
}
function loginPageCheck()
{
    if (!isset($_SESSION['memberID'])) {
        return true;
    } else {
        echo "<script> alert('已登入'); window.location.replace('index.php');</script>";
        exit;
    }
}
