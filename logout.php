<?php
require_once 'header.php';
if (session_destroy()) {
    echo true;
} else {
    echo false;
}
