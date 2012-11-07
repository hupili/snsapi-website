<?php

header("Status: 301 Moved Permanently");
header("Location:http://127.0.0.1:8080/auth/second/". $_SERVER['QUERY_STRING']);
exit;

?>

