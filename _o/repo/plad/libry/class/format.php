<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oClass ~ Summary of Class • DEPENDENCY»
 */
class oFormat {
	private static $instance;

	/***** [PREVENTS MULTIPLE INSTANCES] *****/
	private function __construct(){return;}

	/***** [PREVENTS DUPLICATES] *****/
	private function __clone(){return;}

	/***** [RETURNS SINGLE INSTANCE] *****/
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	/***** NUMBER [RETURN NUMBER AS FORMATED] *****/
	public static function number($input, $digit=2){
		if(is_numeric($input)){
			$rez = $input;
			if(!empty($digit) && is_numeric($digit)){
				$rez = number_format($input, $digit);
			}
			else {
				$rez = number_format($input);
			}
			return $rez;
		}
		return false;
	}

	/***** SIZE [RETURN COMPUTER-BASED MEASURMENT OF INPUT] *****/
	public static function size($byte){
		if(!empty($byte)){
			if($byte>=1073741824){$rez = number_format($byte / 1073741824 , 2) . 'GB';}
			elseif($byte>=1048576){$rez = number_format($byte / 1048576 , 2) . 'MB';}
			elseif($byte>=1024){$rez = number_format($byte / 1024 , 2) . 'KB';}
			elseif($byte>1){$rez = $byte . ' bytes';}
			elseif($byte==1){$rez = $byte . ' byte';}
			else {$rez = '0';}
			return $rez;
		}
		return false;
	}
}
?>