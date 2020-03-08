<?php
/* Copyright 2020 - 9san Development Group */
if(isset($_GET['brd_name']) && isset($_GET['gbl'])){
      $imagesDir = 'static/banners/' . $_GET['brd_name'] . '/';
    if ($_GET['gbl'] === 'true') {
    	$imagesDir = 'static/globalbanner/';
    }
  	$images = glob($imagesDir . '*.*');
	
	if (empty($images)) {
		$imagesDir = 'static/globalbanner/';
		$images = glob($imagesDir . '*.*');
	} 
	elseif (!($images)) {
		exit('static/nobanner.png');
	}
	exit($images[array_rand($images)]);
}
else {
    exit('request error');
}
?>