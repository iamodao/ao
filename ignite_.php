<?php
require 'orax/ophp/libry/class/dump.inc';
require 'orax/ophp/libry/class/string.inc';


$string = 'John_K__K_Doe';
echo oDump::Neat(oString::To($string, '_K_', ' K.' , 'oLAST', $case_sensitive=false));
?>