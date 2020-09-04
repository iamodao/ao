<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oPrint ~ Summary of Class • DEPENDENCY»
 */
class oPrint {
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

	/***** METHOD [DESCRIBE METHOD] *****/
	public static function message($input, $treat='iNotify'){
		#Toda ~ develope method
		echo $message;
		return;
	}

	/***** JSON [RETURN CONTENT IN JSON FORMAT] *****/
	public static function json($input){
		if(!empty($input)){
			header('Content-Type: application/json');
			return json_encode($input);
		}
		return;
	}

	/***** [RETURN OUTPUT] *****/
	public static function dbug($input, $treat='iPRETTY', $exit='iYeap'){
		if($treat == 'iJSON'){
			self::json($input);
			exit;
		}
		else {
			echo '<p><em>ZENQ Deburging</em></p><hr>';
			if($treat == 'iPRINT'){print_r($input);}
			elseif($treat == 'iDUMP'){var_dump($input);}
			elseif($input === true){echo "Bool: TRUE";}
			elseif($input === false){echo "Bool: FALSE";}
			elseif(is_array($input) && $treat == 'iPRETTY'){
				foreach ($input as $key => $value){
					if(is_array($value)){
						foreach ($value as $valueKey => $valueSub){
							echo ' <strong>'.$key."</strong>['".$valueKey."']".': '.$valueSub.'<br>';
						}
					}
					else {
						echo '<strong>'.$key.':</strong> '. $value.'<br>';
					}
				}
			}
			else {
				echo '<tt><pre>'.var_export($input, true).'</pre></tt>';
			}
		}
		if($exit == 'iNope'){exit;}
	}
}
?>