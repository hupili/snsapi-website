<?php

$qs = $_SERVER['REQUEST_URI'];

$ret = preg_match('"bouncer/redir/([^/]+)/([^/]+)/\?([^/]+)$"', $qs, $m);

if ($ret){
	$host = $m[1];
	$port = $m[2];
	$param = $m[3];
	$allowed_host = Array(
		"localhost", 
		"127.0.0.1", 
		"127.0.0.2"
	) ;
	if (in_array($host,$allowed_host)){
		#echo "ok" ;
		header("Status: 301 Moved Permanently");
		header("Location:http://$host:$port/auth/second/?$param");
		exit ;
	} else {
		echo "Provided host is now allowed!" ;
		exit ;
	}
} else {
	echo "false redir request! Use the pattern bouncer/redir/{{HOST}}/{{PORT}}/?{{URL_PARAM}}" ;
}

?>
