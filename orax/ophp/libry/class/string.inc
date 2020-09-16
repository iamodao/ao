<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oString ~ String Handling • DEPENDENCY»
 */
class oString {

	//Is • Returns TRUE/FALSE if string is empty or not
	public static function Is($i){
		if(!isset($i)){return true;}
		else {
			if(is_array($i)){
				if(empty($i)){return true;}
			} else {
				$i = trim($i);
				$length = strlen($i);
				if($length < 1){return true;}
			}
		}
		return false;
	}
}
