<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * oFile ~ File & Directory Utility • DEPENDENCY»
 */
class oFile {

	/***** [RETURNS TRUE/FALSE -file or directory is valid & exist] *****/
	public static function Is($path='', $type='oFILE'){
		if($type === 'oFILE'){
			if(is_dir($path)){return false;}
			elseif(is_file($path) === false){return false;}
			return true;
		}
		elseif($type === 'oDIR'){
			if(is_dir($path) === false){return false;}
			return true;
		}
	}


	/***** [RETURNS required -file when its valid & exist] *****/
	public static function Inc($path=''){
		if(self::Is($path, 'oFILE') === false){
			return oExit::NotFound($path);
		}
		return require $path; // return true;
	}
}
