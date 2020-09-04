<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oFile ~ Summary of Class • DEPENDENCY»
 */
class oFile {
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

	/***** [RETURNS TRUE/FALSE -file is valid & exist] *****/
	public static function is($path){
		if(is_dir($path)){return false;}
		elseif(is_file($path) === false){return false;}
		return true;
	}

	/***** [RETURNS FILE INFORATION] *****/
	public static function info($res='iData', $file='iSelf'){
		if($file == 'iSelf'){$file = $_SERVER['PHP_SELF'];}
		$path = pathinfo($file);

		if($res == 'iDir' && !empty($path['dirname'])){$rez = $path['dirname'];}
		elseif($res == 'iBase' && !empty($path['basename'])){$rez = $path['basename'];}
		elseif($res == 'iExt' && !empty($path['extension'])){$rez = $path['extension'];}
		elseif($res == 'iName' && !empty($path['filename'])){$rez = $path['filename'];}
		elseif($res == 'iData'){$rez = $path;}

		if(!empty($rez)){return $rez;}
		return false;
	}

	public static function download($file, $save=''){
		if(self::is($file)){
			$name = self::info('iName', $file);
			$ext = self::info('iExt', $file);
			if(!empty($save)){$save = mt_rand();}
			$save = $save.'.'.$ext;
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename ="'.$save.'"');
			readfile($file);
			exit;
		}
	}
}
?>