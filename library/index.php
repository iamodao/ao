<?php
require 'config.inc';

require 'php/dump.inc';
require 'php/exit.inc';
require 'php/file.inc';
oFile::Inc('php/json.inc');
oFile::Inc('php/database.inc');

$database = new oDatabase($dba, 'pdo');
$dbo = $database->connect();

$stmt = $dbo->prepare("CALL DrinkAll()");
$exec = $stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($exec != false && !empty($result)){
	oJSON::run($result, 'oPRINT');
}

echo oDump::Neat($result);
?>
