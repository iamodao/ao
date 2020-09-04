<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oCurrency ~ Summary of Class • DEPENDENCY»
 */
class oCurrency {
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

	/***** CURRENCY DATABASE *****/
	public static function database(){
		$rez = array(
			'NGN' => array('iSign' => '₦', 'iCountry' => 'Nigeria', 'iCurrency' => 'Naira'),
			'USD' => array('iSign' => '$', 'iCountry' => 'United States', 'iCurrency' => 'Dollar'),
			'GBP' => array('iSign' => '£', 'iCountry' => 'United Kingdom', 'iCurrency' => 'Pound'),
			'EUR' => array('iSign' => '€', 'iCountry' => 'Europe', 'iCurrency' => 'Euro'),
			'JPY' => array('iSign' => '¥', 'iCountry' => 'Japan', 'iCurrency' => 'Yen'),
			'INR' => array('iSign' => '₹', 'iCountry' => 'India', 'iCurrency' => 'Rupee'),
		);
		return $rez;
	}

	/***** RETURN - CURRENCY/SYMBOL/COUNTRY *****/
	public static function to($code, $res='iData'){
		$database = self::database();
		if(array_key_exists($code, $database)){
			$currency = $database[$code];
			if(!empty($currency[$res])){return $currency[$res];}
			elseif($res == 'iData'){
				$currency['iCode'] = $code;
				return $currency;
			}
		}
		return false;
	}

}
?>