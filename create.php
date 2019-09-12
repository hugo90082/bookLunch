<?php
require_once 'header.php';
loginRootCheck();



$NoValue = isset($_SESSION['NoValue']) ? $_SESSION['NoValue'] : "<br>";

$smarty->assign('NoValue', $NoValue);
unset($_SESSION['NoValue']);
$smarty->display('create.html');
