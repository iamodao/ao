<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oSSL ~ HTTP Secured URL • DEPENDENCY» session::
 */
class oSSL {
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

	/***** [DETECT HTTPS & RETURN TRUE/FALSE] *****/
	public static function https(){
		#set Defaults
		$rez = false; $https = 'inactive'; $port = 'default';

		#prepare HTTPs
		if(!empty($_SERVER['HTTPS'])){$https = $_SERVER['HTTPS'];}
		if($https !== 'inactive'){$https == 'active';}

		#prepare Port
		if(!empty($_SERVER['SERVER_PORT'])){$port = $_SERVER['SERVER_PORT'];}

		#resolution
		if($https == 'active' || $port == 443){$rez = true;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){$rez = true;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'){$rez = true;}

		#return
		return $rez;
	}

	/***** [ENFORCE HTTPS (will start PHP session)] *****/
	public static function impose($link='', $permanent='iNope'){
		#start PHP Session
		if(!headers_sent() && empty($_SESSION)){session_start();}

		if(empty($_SESSION['vImposeSSL']) || $_SESSION['vImposeSSL'] !== 'imposed'){
			#set protocal
			$protocol = self::https() ? 'https' : 'http';

			#Resolution (HTTP to HTTPs)
			if($protocol !== 'https'){
				$rez = 'https://';
				if(!empty($link)){$rez .= $link;}
				else {
					if(!empty($_SERVER['HTTP_HOST'])){$rez .= $_SERVER['HTTP_HOST'];}
					if(!empty($_SERVER['REQUEST_URI'])){$rez .= $_SERVER['REQUEST_URI'];}
				}

				#Valid URL only
				if(filter_var($rez, FILTER_VALIDATE_URL) !== false){
					$_SESSION['vImposeSSL'] = 'imposed';
					if($permanent == 'iYeap'){header('HTTP/1.1 301 Moved Permanently');}
					header('Location: ' . $rez);
					exit;
				}
			}
		}
	}
}
?>