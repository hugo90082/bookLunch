<?php
require_once 'member.php';
$memberRoute = htmlspecialchars($_POST["memberRoute"]);

if ($memberRoute === "login") {
    $mail = htmlspecialchars($_POST["mail"]);
    $pwd = htmlspecialchars($_POST["password"]);

    if ($mail === "" && $pwd === "") {
        echo "3";
    } else {
        $member = new member();
        echo $member->login($mail, $pwd);
    }
} else if ($memberRoute === "logout") {
    $member = new member;
    echo $member->logout();
} else if ($memberRoute === "signUp") {
    $mail = htmlspecialchars($_POST["mail"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordCheck = htmlspecialchars($_POST["passwordCheck"]);
    if ($mail === "" || $password === "" || $passwordCheck === "") { ##判斷是否空值
        echo "2";
    } else if ($password !== $passwordCheck) { ##判斷密碼不同
        echo "3";
    } else {
        $member = new member;
        echo $member->signUp($mail, $password);
    }
} else {
    echo "9";
}
