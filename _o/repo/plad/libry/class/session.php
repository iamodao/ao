<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oSession ~ PHP Session • DEPENDENCY»
 */
class oSession {
	private static $instance;
	protected static $name;

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

	/***** [START PHP SESSION] *****/
	public static function start($name='XENQ'){
		if(!headers_sent() && empty($_SESSION)){
			if(!empty($name)){
				self::$name = $name;
				session_name($name);
			}
			else {
				self::$name = session_name();
			}
			return session_start();
		}
	}

	/***** [ROLLBACK PHP SESSION -to last active session information] *****/
	public static function rollback(){
		if(!empty($_SESSION)){
			return session_reset();
		}
	}

	/***** [ABORT PHP SESSION -maintain session while discarding changes to session on current page] *****/
	public static function abort(){
		if(!empty($_SESSION)){
			return session_abort();
		}
	}

	/***** [DELETE PHP SESSION -unset session or session's variable] *****/
	public static function remove($var=''){
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
	public static function destroy(){
		if(isset($_SESSION['session_status'])){
			unset($_SESSION['session_status']);
		}
		return session_destroy();
	}

	/***** [TERMINATE PHP SESSION] *****/
	public static function terminate(){
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
	public static function fresh($name='XENQ'){
		self::start($name);
		self::terminate();
		self::start($name);
		return;
	}
}
?>