<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oUtil ~ Summary of Class • DEPENDENCY» session
 */
class oUtil {
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

	/***** PHP [CHECK VARIOUS PHP RELATED INFO] *****/
	public static function php($task='iVer'){
		if($task == 'iVer'){$rez = phpversion();}

		if(!empty($rez)){return $rez;}
	}

	/***** APACHE [CHECK VARIOUS APACHE RELATED INFO] *****/
	public static function apache($task='iVer'){
		if($task=='iVer'){$rez = apache_get_version();}

		if(!empty($rez)){return $rez;}
	}

	/***** [CHECK IF ARRAY IS MULTI-DIMENTIONAL] *****/
	public static function isMultiArray($array){
		if(is_array($array)){
			$rez = array_filter($array, 'is_array');
			if(count($rez) > 0){return true;}
		}
		return false;
	}



	/***** [SET & RETURN LANG] *****/
	public static function lang($lang=''){
		if(empty($lang)){
			if(!empty($_GET['lang'])){$_SESSION['iLang'] = $_GET['lang'];}
			elseif(!empty($_POST['lang'])){$_SESSION['iLang'] = $_POST['lang'];}

			if(empty($_SESSION['iLang'])){$_SESSION['iLang'] = 'en';}
			$lang = $_SESSION['lang'];
		}
		else {
			$_SESSION['lang'] = $lang;
		}
		return $lang;
	}


	public static function Amount($amount, $currency){
		// if(!isEmpty($currency) && !isEmpty($amount)){
		// 	$symbol = currencyToSymbol($currency);
		// 	$amount = formatNum($amount);
		// 	return $symbol.$amount;
		// }
	}
}
?>
