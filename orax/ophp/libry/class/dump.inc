<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDump ~ Variable PRINT & DUMP • DEPENDENCY»
 */
class oDump {


	//METHOD • Describe method
	public static function Export($i, $capture=true){
		return '<pre><tt>'.var_export($i, $capture).'</tt></pre>';
	}
}