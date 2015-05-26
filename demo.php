<?php
# plugin
include_once('vendor/pmvc/pmvc/include_plug.php');
PMVC\setPlugInFolder('../');

# add route
$twoStep = PMVC\plug('2-step');
$secret = $twoStep->getNewSecret('test');
var_dump($secret);

$one = $twoStep->getOneCode();
var_dump($one);

var_dump($twoStep->validate(array(
   'one'=>$one 
)));


