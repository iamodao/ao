<?php
/*** BEGIN PROJECT CONFIGURATION ***/
$aHavest['config'] = array(
	'source' => oRouter::Source(),
	'route' => oRouter::Route(),
	'link' => oRouter::Link(),

	#directory
	'directory' => array(
		'root' => oRouter::Path('oSourcePath'),
	),

	#database
	'database' => array(
		'name' => "aodb",
		'user' => "ao",
		'password' => "AO20",
		'host' => "ao.co",
	),
);
/*** END PROJECT CONFIGURATION ***/


echo oDump::Neat($aHavest);