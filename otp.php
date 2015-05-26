<?php
namespace PMVC\PlugIn\Auth;

\PMVC\l(__DIR__.'/GoogleAuthenticator/PHPGangsta/GoogleAuthenticator.php');

${_INIT_CONFIG}[_CLASS] = 'PMVC\PlugIn\Auth\OTP';

class OTP extends \PMVC\PLUGIN
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
        $this->set('secret',$return->secret);
        return $return;
    }

    public function getOneCode($params=array())
    {
        return $this->getCode(
            $this->get('secret')
        ); 
    }

    public function validate($params=array())
    {
       $this->set($params);
       return  $this->verifyCode(
            $this->get('secret'),
            $this->get('one')
       );
    }
}
