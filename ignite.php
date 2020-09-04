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
oFile::Inc(oPHPD.'router.inc');

#IGNITION
$oIgnition['source'] = oRouter::Source();
$oIgnition['route'] = oRouter::Route();
$oIgnition['link'] = oRouter::Link();

#INCLUDE LIBRARY
oFile::Inc(SOURCE.'config.inc', 'isOptional');
oFile::Inc(ROOT.'switch.inc', 'isRequired');

#SANDBOX FILE - for development, demo & testing
oFile::Inc(ROOT.'_ignore'.DS.'debug.inc', 'isOptional');
?>