<?php
/*
	(C) 2020 - 9san Development Group
	
	$config['link_prefix'] = '/derefer.php?'; 
*/

if(($pos = strpos($_SERVER['REQUEST_URI'], '?')) !== false) { //get full url

	$url = trim(substr($_SERVER['REQUEST_URI'], $pos + 1)); //get url string

	if(!empty($url)) {
		usleep(400 * 1000);
		header('Cache-Control: no-cache'); 
		header('Location: ' . $url);
	}
}
else {
	usleep(400 * 1000);
	header('Location: /'); //redirect frontpage if no url supplied
}
?>