<?php
PMVC\Load::plug();
PMVC\Load::plug(null, ['../']);
class OtpTest extends PHPUnit_Framework_TestCase
{
    function testPlugin()
    {
        ob_start();
        $plug = 'otp';
        print_r(PMVC\plug($plug));
        $output = ob_get_contents();
        ob_end_clean();
        $this->assertContains($plug,$output);
    }

    function testOtp()
    {
        $secret = PMVC\plug('otp')->getNewSecret('test');
        $one = PMVC\plug('otp')->getOneCode();
        $isValidated = PMVC\plug('otp')->validate(array(
           'one'=>$one 
        ));
        $this->assertTrue($isValidated);
    }
}
