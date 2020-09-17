<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oFile ~ File & Directory Utility • DEPENDENCY»
 */
class oFile {
	private static $Instance;

	//Is • Returns TRUE/FALSE if file or directory is valid & exist
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


	//InCheck • Check file existence before include/require
	public static function InCheck($path){
		if(self::Is($path, 'oFILE') === false){
			return oExit::NotFound($path);
		}
		return true;
	}


	//In • RETURNS required -file when its valid & exist
	public static function Inc($path, $i='isRequired'){
		if($i == 'isRequired'){
			self::InCheck($path);
			require $path;
			return;
		}
		else {
			if(self::Is($path, 'oFILE') !== false){
				require $path;
				return;
			}
		}
	}


} // EndOfClass - oFile