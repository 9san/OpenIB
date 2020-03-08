<?php

if (php_sapi_name() != 'cli') {
	header('HTTP/1.0 403 Forbidden', true, 403);
	$forbidden = file_get_contents(__dir__ . '/403', TRUE);
    exit($forbidden);
}

include "inc/functions.php";
$body = Element("8chan/donate.html", array("config" => $config));

$body = Element("page.html", array("config" => $config, "boardlist" => createBoardlist(), "body" => $body, "title" => "Donate"));
file_write("donate", $body);
print $body;
