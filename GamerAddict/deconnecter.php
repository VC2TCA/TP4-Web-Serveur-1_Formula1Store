<?php
// session_unset();
// session_destroy();
// header("Location: index.php");
// exit();

session_unset();
// setcookie("PHPSESSID", "", time() - 3600, "/", "", 1);
session_destroy();
echo "OK";

header("Location: index.php");
exit();
