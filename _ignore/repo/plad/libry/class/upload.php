<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oUpload ~ Summary of Class • DEPENDENCY» file
 */
class oUpload {
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

	/***** METHOD [DESCRIBE METHOD] *****/
	public static function file($field='upload', $return = '', $config=''){
		// if(!empty($_FILES[$field])){
		$file = $field;
			// $file = $_FILES[$field];
		if(!empty($config['fileDir'])){$fileDir = $config['fileDir'];} else {$fileDir = "odrive/";}
		if(!empty($config['fileName'])){$fileName = $config['fileName'];} else {$fileName = mt_rand().'_'.basename($file["name"]);}
		if(!empty($config['filesAllowed'])){$filesAllowed = $config['filesAllowed'];} else {$filesAllowed = array('jpg','png','jpeg','gif','pdf', 'md');}

		$fileTemp = $file["tmp_name"];
		$filePath = $fileDir.$fileName;
		$fileType = pathinfo($filePath, PATHINFO_EXTENSION);

		if($file['error'] < 1){
			if(in_array($fileType, $filesAllowed)){
					#check if a file exists on the destination
				if(oFile::is($filePath)){$rez['error'] = array('msg' => 'File name already exists');}
				else {
					$uploadFile = move_uploaded_file($fileTemp, $filePath);
					if($uploadFile === true){$rez['fileName'] = $fileName;}
				}
			}
		}
		// }
	}
}
?>