<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ==== === ===== === ===== === ===== ======= ==== ========= ==== ==== ======= ======== ======== === ===
 * oRouter ~ Handle Routing • DEPENDENCY»
 */
class oRouter {
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



	/***** CHECK IF API route EXISTS OR FALSE *****/
	public static function is_api(){
		if(!empty($_GET['oroute']) && $_GET['oroute'] == 'oapi'){return 'yeah';}
		return 'nope';
	}

	/***** CHECK IF APP route EXISTS OR FALSE *****/
	public static function is_app(){
		if(!empty($_GET['oroute']) && $_GET['oroute'] == 'oapp'){return 'yeah';}
		return 'nope';
	}

	/***** CHECK FOR SUB DOMAIN *****/
	public static function osd(){
		if(!empty($_GET['osd'])){$o = $_GET['osd'];}
		else {

		}

		return strtolower($o);
	}


	/***** RETURNS VALUE OF LINK *****/
	public static function info($return=''){
		$tsk['olink'] = self::link();
		$tsk['oapi'] = self::is_api();
		$tsk['oapp'] = self::is_app();
		$tsk['osd'] = self::osd();
		return $tsk;
	}


	/***** GET & SET SOURCE *****/
	public static function Source($i='oGET'){
		if($i == 'oGET'){
			if(!empty($_GET['osource'])){$o = $_GET['osource'];}
			else {
				#TODO ~ call method handling sub-domain detection
			}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}


	/***** GET & SET LINK - returns value of olink *****/
	public static function Link($i='oGET'){
		if($i == 'oGET'){
			if(!empty($_GET['olink'])){$o = $_GET['olink'];}
			else {$o = 'index';}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}


	/***** GET & SET ROUTE - returns value of oroute *****/
	public static function Route($i='oGET'){
		if($i == 'oGET'){
			if(!empty($_GET['oroute'])){$o = $_GET['oroute'];}
			else {
				#$o = 'index';
			}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}


	/***** GET & SET PATH to file/dir [on this router] - returns value *****/
	public static function Path($r= 'oInitFile', $i='oGET'){
		if($i == 'oGET'){

			#Source path
			if($r == 'oSourcePath'){$o = SOURCE.'o'.self::Source().DS; return $o;}

			#Initialization file
			if($r == 'oInitFile'){
				$o = self::Path('oSourcePath').'init.inc';
				oFile::InCheck($o);
				return $o;
			}
		}
	}


}
