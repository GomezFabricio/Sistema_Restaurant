<?php
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['dni'] = $user['emp_dni'];
?>