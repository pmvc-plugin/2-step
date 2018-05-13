<?php
namespace PMVC\PlugIn\otp;

use PHPGangsta_GoogleAuthenticator;
use stdClass;

\PMVC\l(__DIR__.'/GoogleAuthenticator/PHPGangsta/GoogleAuthenticator.php');

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\otp';

class otp extends \PMVC\PlugIn
{

    public function init()
    {
        $googleAuth = new PHPGangsta_GoogleAuthenticator();
        $this->setDefaultAlias($googleAuth);
    }

    public function getNewSecret($name)
    {
        $return = new stdClass();
        $return->secret = $this->createSecret();
        $return->qrcode = $this->getQRCodeGoogleUrl(
            $name,
            $return->secret
        );
        $this['secret']=$return->secret;
        return $return;
    }

    public function getOneCode( array $params = [])
    {
        $params = \PMVC\arrayReplace(
            $params,
            $this
        );
        return $this->getCode(
            \PMVC\get($params, 'secret')
        );
    }

    public function validate( array $params = [])
    {
        $params = \PMVC\arrayReplace(
            $params,
            $this
        );
       return  $this->verifyCode(
            \PMVC\get($params, 'secret'),
            \PMVC\get($params, 'one')
       );
    }
}
