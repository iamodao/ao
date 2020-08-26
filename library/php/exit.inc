<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * oExit ~ Exit with message • DEPENDENCY»
 */
class oExit {

	public static function Now($obj, $msg, $extra=''){
		$o = strtoupper($obj).'::';
		if(!empty($msg)){$o .=' <strong>'.ucwords($msg).'</strong>';}
		if(!empty($extra)){
			if(is_string($extra)){$o .= ' (<small><em>'.$extra.'</em></small>)';}
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


	#404 EXIT - with error message
	public static function NotFound ($path='', $msg = '',  $obj=''){
		if(!empty($obj)){$o['oBJECT'] = $obj;} else {$o['oBJECT'] = 'oResource';}
		if(!empty($msg)){$o['oMESSAGE'] = $msg;} else {$o['oMESSAGE'] = 'Resource Unavailable';}
		if(!empty($path)){$o['oPATH'] = $path;}
		oDump::Neat($o);
		exit;
	}

}