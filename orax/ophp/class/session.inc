<?php
/**AO™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * oSession ~ Handles PHP Session • DEPENDENCY»
 */
class oSession {
	private static $Instance;
	protected static $Name;

	/***** [PREVENTS MULTIPLE INSTANCES] *****/
	private function __construct(){return;}

	/***** [PREVENTS DUPLICATES] *****/
	private function __clone(){return;}

	/***** [RETURNS SINGLE INSTANCE] *****/
	public static function Instantiate(){
		if(is_null(self::$Instance)){
			self::$Instance = new self();
		}
		return self::$Instance;
	}

	/***** [START PHP SESSION] *****/
	public static function Start($i='XENQ'){
		if(!headers_sent() && empty($_SESSION)){
			if(!empty($i)){
				self::$Name = $i;
				session_name($i);
			}
			else {
				self::$Name = session_name();
			}
			return session_start();
		}
	}


	/***** [ROLLBACK PHP SESSION -to last active session information] *****/
	public static function Rollback(){
		if(!empty($_SESSION)){
			return session_reset();
		}
	}

	/***** [ABORT PHP SESSION -maintain session while discarding changes to session on current page] *****/
	public static function Abort(){
		if(!empty($_SESSION)){
			return session_abort();
		}
	}

	/***** [DELETE PHP SESSION -unset session or session's variable] *****/
	public static function Remove($var=''){
		if(!empty($_SESSION)){
			if(isset($_SESSION[$var])){
				unset($_SESSION[$var]);
				return true;
			}
			else {
				return session_unset();
			}
		}
		return false;
	}

	/***** [DESTROY PHP SESSION -destroys all of the data associated with the current session] *****/
	public static function Destroy(){
		if(isset($_SESSION['session_status'])){
			unset($_SESSION['session_status']);
		}
		return session_destroy();
	}

	/***** [TERMINATE PHP SESSION] *****/
	public static function Terminate(){
		if(!empty($_SESSION)){
			$_SESSION = array();
			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
				setcookie(
					session_name(),
					'',
					time() - 42000,
					$params["path"],
					$params["domain"],
					$params["secure"],
					$params["httponly"]
				);
			}
			session_unset();
			session_destroy();
		}
	}

	/***** [TERMINATE & START FRESH PHP SESSION] *****/
	public static function Fresh($Name='XENQ'){
		self::Start($Name);
		self::Terminate();
		self::Start($Name);
		return;
	}
}