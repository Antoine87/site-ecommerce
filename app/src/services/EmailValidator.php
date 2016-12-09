<?php


namespace m2i\ecommerce\services;


use Doctrine\Instantiator\Exception\InvalidArgumentException;

class EmailValidator
{

    public function validate($email){

        if(empty($email)){
            throw new InvalidArgumentException();
        }

        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        return $email != null;
    }

}