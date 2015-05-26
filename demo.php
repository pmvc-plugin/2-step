<?php
# plugin
include_once('vendor/pmvc/pmvc/include_plug.php');
PMVC\setPlugInFolder('../');

# add route
$secret = PMVC\plug('otp')->getNewSecret('test');
var_dump($secret);

$one = PMVC\plug('otp')->getOneCode();
var_dump($one);

var_dump(PMVC\plug('otp')->validate(array(
   'one'=>$one 
)));


