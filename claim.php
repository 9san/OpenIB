<?php

if (php_sapi_name() != 'cli') {
	header('HTTP/1.0 403 Forbidden', true, 403);
	$forbidden = file_get_contents(__dir__ . '/403', TRUE);
    exit($forbidden);
}

include 'inc/functions.php';
if (php_sapi_name() == 'fpm-fcgi') {
        error('Cannot be run directly.');
}
function last_activity($board) {
        // last post
        $query = prepare(sprintf("SELECT MAX(time) AS time FROM posts_%s", $board));
        $query->execute();
        $row = $query->fetch();
        $ago = (new DateTime)->sub(new DateInterval('P1W'));
        $mod_ago = (new DateTime)->sub(new DateInterval('P2W'));

        $last_activity_date = new DateTime();
        $last_mod_date = new DateTime();

        $last_activity_date->setTimestamp($row['time']);

        $query = prepare("SELECT id, username FROM mods WHERE boards = '$board' AND type = 20");
        $query->execute() or error(db_error($query));
        $mods = $query->fetchAll();

        if ($mods) {
                $mod = $mods[0]['id'];
                $query = prepare("SELECT MAX(time) AS time FROM modlogs WHERE `mod` = $mod");
                $query->execute() or error(db_error($query));
                $a = $query->fetchAll(PDO::FETCH_COLUMN);

                if ($a[0]) {
                        $last_mod_date->setTimestamp($a[0]);
                        if (!$row['time'])
                                $last_activity_date->setTimestamp($a[0]);
                } else {// no one ever logged in, try board creation time
                        $query = prepare("SELECT UNIX_TIMESTAMP(time) AS time FROM board_create WHERE uri = '$board'");
                        $query->execute() or error(db_error($query));
                        $crt = $query->fetchAll(PDO::FETCH_COLUMN);
                        if ($crt) $last_activity_date->setTimestamp($crt[0]);
                        $last_mod_date = false;
                }
        }

        //if no post and if BO has logged in within two weeks. SHOULD NOT be including boards in claim.html
        if (!$row['time'] || ($last_mod_date and $last_mod_date > $mod_ago)){
                return false;
        }

        if (($last_activity_date < $ago or ($last_mod_date and $last_mod_date < $mod_ago))) {
                return array($last_activity_date, $last_mod_date, $mods);
        }
        else {
                return false;
        }
}
$q = prepare("SELECT uri FROM boards");
$q->execute() or error(db_error($q));
$boards = $q->fetchAll(PDO::FETCH_COLUMN);
$delete = array();
foreach($boards as $board) {
        $last_activity = last_activity($board);

        if ($last_activity) {
                list($last_activity_date, $last_mod_date, $mods) = $last_activity;

                $last_mod_f = $last_mod_date ? $last_mod_date->format('Y-m-d H:i:s') : '<em>never</em>';
                $last_activity_f = $last_activity_date ? $last_activity_date->format('Y-m-d H:i:s') : '<em>never</em>';
                $not_allowed = array("jim","sudo","delete");
                if(!in_array($board,$not_allowed))
                        $delete[] = array('board' => $board, 'last_activity_date' => $last_activity_f, 'last_mod' => $last_mod_date, 'last_mod_f' => $last_mod_f);
        }

}
$body = Element("8chan/claim.html", array("config" => $config, "delete" => $delete));
file_write("claim", Element("page.html", array("config" => $config,"boardlist" => createBoardlist(), "body" => $body, "title" => _("Claim a Board"), "subtitle" => _("Be patient, follow the process, and claim a board"))));
