<?php
# plugin
include_once('../vendor/autoload.php');
PMVC\Load::plug(null, ['../../']);

# add route
var_dump( PMVC\plug('otp')->getNewSecret('test'));

$one = PMVC\plug('otp')->getOneCode();
var_dump($one);

var_dump(PMVC\plug('otp')->validate(array(
   'one'=>$one 
)));

//var_dump( PMVC\plug('otp')->getQRCodeGoogleUrl('name','secret'));
