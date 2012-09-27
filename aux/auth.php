<?php

header("Status: 301 Moved Permanently");
header("Location:http://localhost:12121/auth.php?". $_SERVER['QUERY_STRING']);
exit;

?>

