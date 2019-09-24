<?php
require_once 'member.php';
$memberRoute = htmlspecialchars($_POST["memberRoute"]);

if ($memberRoute === "login") {
    $mail = htmlspecialchars($_POST["mail"]);
    $pwd = htmlspecialchars($_POST["password"]);
    $member = new member();
    echo $member->login($mail, $pwd);
} else if ($memberRoute === "logout") {
    $member = new member;
    echo $member->logout();
} else if ($memberRoute === "signUp") {
    $mail = htmlspecialchars($_POST["mail"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordCheck = htmlspecialchars($_POST["passwordCheck"]);
    $member = new member;
    echo $member->signUp($mail, $password ,$passwordCheck);
} else {
    echo "9";
}
