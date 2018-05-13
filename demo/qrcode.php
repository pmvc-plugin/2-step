<?php
# plugin
include_once('../vendor/autoload.php');
PMVC\Load::plug(null, ['../../']);

$otp = \PMVC\plug('otp');

$name = 'coin';
$code = '4BPI4PVYQT76HB2M';

var_dump($otp->getQRCodeGoogleUrl(
    $name,
    $code
));

