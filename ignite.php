<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ==== === ===== === ===== === ===== ======= ==== ========= ==== ==== ======= ======== ======== === ===
 * DEFAULT ~ Index Handler • DEPENDENCY»
 */

#DEFINE SEPARATOR
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

#DEFINE DIRECTORY
defined('ROOT') ? null : define('ROOT', __DIR__.DS);
defined('ORAX') ? null : define('ORAX', ROOT.'orax'.DS);
defined('oPHPD') ? null : define('oPHPD', ORAX.'ophp'.DS);
defined('SOURCE') ? null : define('SOURCE', ROOT.'source'.DS);

#REQUIRE ESSENTIAL
require oPHPD.'dump.inc';
require oPHPD.'exit.inc';
if(!file_exists(oPHPD.'file.inc')){oExit::NotFound(oPHPD.'file.inc');}
require oPHPD.'file.inc';
require oPHPD.'router.inc';

#INCLUDE OTHER [project specific] LIBRARY
// oFile::Inc(SOURCE.'config.inc');

$o_source = oRouter::Source();
$o_link = oRouter::Link();
$o_route = oRouter::Route();


#HARVERST APP
if($o_source == 'harvest'){
	$oHarvest['RD'] = SOURCE.'o'.$o_source.DS;
	if(oFile::Is($oHarvest['RD'].$o_link.'.inc')){require ($oHarvest['RD'].$o_link.'.inc');}

}


#SANDBOX FILE - for development, demo & testing
$o_debug_file = ROOT.'_ignore'.DS.'debug.inc';
if(oFile::is($o_debug_file)){require $o_debug_file;}
?>