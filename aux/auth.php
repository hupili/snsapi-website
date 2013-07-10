<?php
$qs = $_SERVER['QUERY_STRING'];
if ($qs !== ''){
	header("Status: 301 Moved Permanently");
	header("Location:http://localhost:12121/auth.php?" . $qs);
} else {
	header("Status: 200 OK");
	echo "It looks like you do not have querystring.";
	echo "Maybe your code in in the URL fragment.";
	echo "We try to redirect you to localhost with querystring.";
	echo "<script>_to_prefix='http://localhost:12121/auth.php?'</script>";
	echo "<script src='redirect_fragment.js'></script>";
}
?>

