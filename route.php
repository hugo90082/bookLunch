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
    $member = new member;
    $member->signUp();
} else {
    echo "9";
}
