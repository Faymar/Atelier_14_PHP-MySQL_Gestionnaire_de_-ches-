<?php
require('bd.php');
session_start();
if (isset($_SESSION['id'])) {

    unset($_SESSION['id']);
    session_destroy();
    header("Location: inscription.php");
} else   header("Location: inscription.php");
