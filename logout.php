<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['function']);
header('Location: login.php');