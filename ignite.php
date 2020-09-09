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
defined('oLIB') ? null : define('oLIB', ORAX.'ophp'.DS);
defined('oCLASS') ? null : define('oCLASS', oLIB.'class'.DS);
defined('oFUNC') ? null : define('oFUNC', oLIB.'function'.DS);
defined('oBJ') ? null : define('oBJ', oLIB.'object'.DS);
defined('SOURCE') ? null : define('SOURCE', ROOT.'source'.DS);


#REQUIRE ESSENTIAL
require oCLASS.'dump.inc';
require oCLASS.'exit.inc';
if(!file_exists(oCLASS.'file.inc')){oExit::NotFound(oCLASS.'file.inc');}
require oCLASS.'file.inc';
oFile::Inc(oCLASS.'router.inc');


#INITIALIZE PROJECT (based on a specific project)
// require(oRouter::Path('oInitFile'));


#SANDBOX FILE - for development, demo & testing
oFile::Inc(ROOT.'_ignore'.DS.'debug.inc', 'isOptional');
?>