<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oRandom ~ Summary of Class • DEPENDENCY»
 */
class oRandom {
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

	/***** [RANDOMIZE STRING/ARRAY] *****/
	public static function prepare($input, $length){
		$rez = '';
		if(!is_array($input)){
			$input = str_shuffle($input);
			$inputLength = strlen($input);
			if(is_numeric($length) && ($length <= $inputLength)){
				$rez = substr($input, 0, $length);
			}
			elseif($length == 'iAuto' || $length == 'iAll'){
				$rez = $input;
			}
		}
		else {
			shuffle($input);
			$inputLength = count($input);
			if(is_numeric($length) && ($length <= $inputLength)){
				for($i=0; $i < $length; $i++){
					$rez .= $input[$i];
				}
			}
			elseif($length == 'iAuto' || $length == 'iAll'){
				foreach ($input as $key => $value){
					$rez .= $input[$key];
				}
			}
		}

		if(!empty($rez)){return trim($rez);}
		return false;
	}

	/***** [CREATE & RETURN GENERATED VALUES] *****/
	public static function create($res, $length = 'iAuto', $input=''){
		#special character
		if($res == 'iChar'){
			$char = '(=@#$[%{&*?)}';
			$rez = self::prepare($char, $length);
		}

		#numbers
		elseif($res == 'iNum'){
			$rez = self::prepare('1234567890', $length);
		}

		#alphabet in lowercase
		elseif($res == 'iAlpha'){
			$alpha = range('a', 'z');
			$rez = self::prepare($alpha, $length);
		}

		#alphabet in caps
		elseif($res == 'iAlphaCap'){
			$alpha = range('A', 'Z');
			$rez = self::prepare($alpha, $length);
		}

		#prepare
		elseif($res == 'iPrepare' && !empty($input)){
			$rez = self::prepare($input, $length);
		}

		else {
			$alphaL = range('a', 'z');
			$alphaU = range('A', 'Z');
			$number = '0123456789';
			$time = time();
			$rand = mt_rand();
			$char = '(=@#$[%{&*?)}';

			if($res == 'iUsername'){
				if($length == 'iAuto' || $length == 'iAll'){
					$rez = self::prepare($alphaL, 6).self::prepare($number, 4);
				} else {
					$rez = self::prepare($alphaL, $length);
				}
			}
			elseif($res == 'iTen'){
				$rez = self::prepare($number, 8).self::prepare($alphaU, 2);
			}

			#Todo ~ create serveral other predefined randomization
		}


		if(!empty($rez)){return $rez;}
		return false;
	}

	/***** METHOD [DESCRIBE METHOD] *****/
	public static function digit($length=2){
		return prepare('1234567890', $length);
	}
}
?>