<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oRouter ~ Handle Routing • DEPENDENCY»
 */
class oRouter {
	private static $Instance;

	//CONSTRUCT • Prevents multiple instantiation
	private function __construct(){return;}

	//CLONE • Prevent duplicate
	private function __clone(){return;}

	//INSTANTIATE • Return fresh instance
	public static function Instantiate(){
		if(is_null(self::$Instance)){
			self::$Instance = new self();
		}
		return self::$Instance;
	}

	//IsAPI • check if API route exists or false
	public static function IsAPI(){
		if(!empty($_GET['oroute']) && $_GET['oroute'] == 'oapi'){
			return true;
		}
		return false;
	}


	/***** CHECK IF APP route EXISTS OR FALSE *****/
	public static function IsAPP(){
		if(!empty($_GET['oroute']) && $_GET['oroute'] == 'oapp'){
			return true;
		}
		return false;
	}


	/***** CHECK FOR SUB DOMAIN *****/
	public static function OSD(){
		if(!empty($_GET['osd'])){$o = $_GET['osd'];}
		else {

		}

		return strtolower($o);
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
	public static function URI($i='oGET'){
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
	public static function Path($r= 'oInitFile', $i='oGET', $m='isRequired'){
		if($i == 'oGET'){

			#Source path
			if($r == 'oSourcePath'){$o = SOURCE.'o'.self::Source().DS; return $o;}

			#Initialization file
			if($r == 'oInitFile'){
				$o = self::Path('oSourcePath').'init.inc';
				if($m == 'isRequired'){oFile::InCheck($o);}
				return $o;
			}
		}
	}


	/***** RETURNS VALUE OF LINK *****/
	public static function Info($return=''){
		$tsk['olink'] = self::URI();
		$tsk['oapi'] = self::IsAPI();
		$tsk['oapp'] = self::IsAPP();
		$tsk['osd'] = self::OSD();
		return $tsk;
	}


} // EndOfClass - oRouter