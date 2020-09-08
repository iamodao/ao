<?php
//CONFIG
$aHavest['config'] = array(
	'source' => oRouter::Source(),
	'route' => oRouter::Route(),
	'link' => oRouter::Link(),
	'directory' => array('root' => oRouter::Path('oSourcePath')),
);

#database config
$aHavest['config']['database'] = array('name' => "woca_harvestdb", 'user' => "woca", 'password' => "WOCA", 'host' => "localhost");