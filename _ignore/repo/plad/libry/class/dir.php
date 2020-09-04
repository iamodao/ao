<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oDir ~ Summary of Class • DEPENDENCY»
 */
class oDir {
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

	/***** [RETURNS TRUE/FALSE -directory is valid & exist] *****/
	public static function is($path){
		if(is_dir($path)){return true;}
		return false;
	}
}
?>