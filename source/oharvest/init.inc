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


#application UI
$view = $aHavest['config']['directory']['root'].'layout'.DS.'view'.DS.$aHavest['config']['link'].'.inc';
#oFile::InCheck($view);
#require $view;

echo oDump::Neat($aHavest);


#API Prototype
