<?php

session_start();

$_SESSION = [];

header("location:login.php");

session_destroy();

exit();
