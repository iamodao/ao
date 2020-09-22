<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * oNotify ~ Notification Utility • DEPENDENCY»
 */
class oNotify {

	/***** [RETURNS TRUE/FALSE -send email via PHP Mail] *****/
	public static	function SendEmail($data, $type = 'ohtml'){
		if($type == 'odefault'){
			if(mail($data['to'], $data['subject'], $data['message']) === true){
				return true;
			}
		} elseif($type == 'ohtml'){
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';
			$headers[] = 'From: '.$data['firm'].'<alert@'.$data['domain'].'>';
			if(mail($data['to'], $data['subject'], $data['message'], implode("\r\n", $headers), '-fwebmaster@'.$data['domain']) === true){
				return true;
			}
		}
		return false;
	}
}
