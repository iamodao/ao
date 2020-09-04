<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ==== === ===== === ===== === ===== ======= ==== ========= ==== ==== ======= ======== ======== === ===
 * oString ~ Handle String • DEPENDENCY»
 */
class oNotify {

	/***** RETURNS - true/false [check for needle in string] *****/
	public static function In($string, $needle, $case="oSENSITIVE"){
		if($case == 'oSENSITIVE'){
			if(strpos($string, $needle) !== false){return true;}
		}
		else {
			if(stripos($string, $needle) !== false){return true;}
		}
		return false;
	}
}