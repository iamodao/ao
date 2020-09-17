<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oExit ~ Exit with message • DEPENDENCY»
 */
class oExit {

	//NOW • exit with message
	public static function Now($obj, $msg, $extra=''){
		$o = strtoupper($obj).'::';
		if(!empty($msg)){$o .=' <strong>'.ucwords($msg).'</strong>';}
		if(!empty($extra)){
			if(is_string($extra)){$o .= ' <small><em>('.$extra.')</em></small>';}
			else {
				$rez['oBJECT'] = $obj;
				$rez['oMESSAGE'] = $msg;
				$rez['oEXTRA'] = $extra;
				oDump::Neat($rez);
				exit;
			}
		}
		exit($o);
	}

	//NOT FOUND • 404 exit with error message
	public static function NotFound ($path='', $msg = '',  $obj=''){
		if(empty($obj)){$obj = 'Resource';}
		if(empty($msg)){$msg = 'Not available';}
		self::Now($obj, $msg, $path);
	}

} // EndOfClass - oExit