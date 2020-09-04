<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oRedirect ~ Summary of Class • DEPENDENCY»
 */
class oRedirect {
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

	/***** [REDIRECT URL USING HTTP-EQUIV] *****/
	public static function meta($url, $delay=0, $exit='iNope'){
		$rez = '<meta http-equiv="refresh" content="'.$delay.'; url='.$url.'">';
		if($exit == 'iYeap'){
			exit($rez);
		}
		else {
			return $rez;
		}
	}

	/***** [REDIRECT URL USING HEADERS] *****/
	public static function url($url, $delay=0, $exit='iNope'){
		if(!headers_sent($filename, $linenum)){
			if(!empty($delay) || $exit != 'iNope'){
				header('Refresh:'.$delay.';url='.$url);
			}
			else {
				header('Location: '.$url);
				exit();
			}
		}
		else {
			#Use meta redirect (Headers already sent in $filename on line $linenum)
			return self::meta($url, $delay, $exit);
		}
	}
}
?>