<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * oDUMP ~ Variable Dump & Print • DEPENDENCY»
 */
class oDump {
	public static function Export($i, $capture=true){
		return '<pre><tt>'.var_export($i, $capture).'</tt></pre>';
	}

	public static function Print($i, $capture=true){
		return print_r($i, $capture);
	}

	public static function Neat($i){
		$o = '';
		if(is_array($i)){$label = 'array';}
		elseif(is_bool($i) === true){$label = 'boolean';}

		if(is_array($i)){
			$o .= '<em style="color:gold;">is_'.$label.'</em>';
			$o .='<div style="margin: 0px 0 4px 6px; padding: 3px 5px 5px 10px; border-left: 1px dotted gold;">';
			foreach ($i as $key => $value){
				$o .= '<strong style="color:brown;">'.$key.': </strong>';
				if(is_bool($value) === true){
					$o .= '<em style="color:gold;">is_boolean</em>';
					if($value === true){$o .= ' ~ oTRUE<span><br>';}
					elseif($value === false){$o .= ' ~ oFALSE<span><br>';}
				}

				elseif(is_array($value)){
					$o .= self::Neat($value);
				}
				elseif(is_object($value)){
					$o .= self::Export($value);
				}
				else {
					$o .= $value.'<span><br>';
				}
			}
			$o .= '</div>';
		}
		elseif(is_bool($i) === true){
			$o .= '<em style="color:gold;">is_'.$label.'</em>';
			if($i === true){$o .= ' ~ oTRUE<span><br>';}
			elseif($i === false){$o .= ' ~ oFALSE<span><br>';}
		}
		elseif(is_object($i)){
			$o .= self::Export($i);
		}
		else {
			$o .= self::Print($i);
		}

		return $o;
	}
}
