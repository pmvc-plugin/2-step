<?php
namespace PMVC\PlugIn\otp;

\PMVC\l(__DIR__.'/GoogleAuthenticator/PHPGangsta/GoogleAuthenticator.php');

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\otp';

class otp extends \PMVC\PlugIn
{

    public function init()
    {
        $googleAuth = new \PHPGangsta_GoogleAuthenticator();
        $this->setDefaultAlias($googleAuth);
    }

    public function getNewSecret($name)
    {
        $return = new \stdClass();
        $return->secret = $this->createSecret();
        $return->qrcode = $this->getQRCodeGoogleUrl($name,$return->secret);
        $this['secret']=$return->secret;
        return $return;
    }

    public function getOneCode($params=array())
    {
        return $this->getCode(
            $this['secret']
        ); 
    }

    public function validate($params=array())
    {
       \PMVC\set($this, $params);
       return  $this->verifyCode(
            $this['secret'],
            $this['one']
       );
    }
}
