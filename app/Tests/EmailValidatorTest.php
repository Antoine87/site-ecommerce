<?php

namespace m2i\ecommerce\Test;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use m2i\ecommerce\services\EmailValidator;

class EmailValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    public function setUp(){
        $this->validator = new EmailValidator();
    }

    public function emailProvider(){
        return [
            ["moi moi.com", false, "pas d'espace dans les emails"],
            ["moi.com", false, "un email doit avoir un @"],
            ["moi@moi.com", true, "email valide"]
        ];
    }

    /**
     * @dataProvider emailProvider
     *
     * @param $input
     * @param $expected
     * @param $message
     */
    public function testEmailFromProvider($input, $expected, $message){
        $test = $this->validator->validate($input);
        $this->assertEquals($expected, $test, $message);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmailWithNullValue(){
        $this->validator->validate(null);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmailWithEmptyValue(){
        $this->validator->validate('');
    }

}
