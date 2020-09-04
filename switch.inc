<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ==== === ===== === ===== === ===== ======= ==== ========= ==== ==== ======= ======== ======== === ===
 * SWITCH ~ application switch handler • DEPENDENCY»
 */

global $oIgnition;

#HARVERST APP
if($oIgnition['source'] == 'harvest'){
	echo $oHarvest['RD'] = SOURCE.'o'.$oIgnition['source'].DS;
	// oFile::Inc($oHarvest['RD'].'config.inc');
	#if(oFile::Is($oHarvest['RD'].$o_link.'.inc')){require $oHarvest['RD'].$o_link.'.inc';}
}
?>