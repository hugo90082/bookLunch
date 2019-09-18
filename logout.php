<?php
require_once 'header.php';
if (session_destroy()) {
    echo "1";
} else {
    echo "0";
}
