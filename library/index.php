<?php
require 'config.inc';
require 'php/dump.inc';
require 'php/exit.inc';
require 'php/file.inc';
oFile::Inc('php/json.inc');
oFile::Inc('php/database.inc');

$omysqli = new oDatabase($dba);
$ao['MySQLi'] = $omysqli->connect();
$opdo = new oDatabase($dba, 'pdo');
$ao['PDO'] = $opdo->connect();
echo oDump::Neat($ao);
?>
