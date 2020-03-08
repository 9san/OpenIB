<?php

if (php_sapi_name() != 'cli') {
	header('HTTP/1.0 403 Forbidden', true, 403);
	$forbidden = file_get_contents(__dir__ . '/403', TRUE);
    exit($forbidden);
}

include "inc/functions.php";
$body = Element("8chan/404.html", array("config" => $config));

$body = Element("page.html", array("config" => $config, "boardlist" => createBoardlist(), "body" => $body, "title" => "404 - Not Found"));
file_write("404", $body);
print $body;
