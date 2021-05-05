<?php

namespace Card;

use Exception;

class CreditCard
{
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }
    
    public function checkNumber()
    {

        if(preg_match( '/[a-zA-Z]/', $this->number )) {
            throw new Exception("The entry should only contain numbers.", 1);
        }

        return $this->check_luhn();
    }

    public function check_luhn()
    {
        $num = $this->number;

        $num = preg_replace('/[^0-9]/', '', $num);

        $str = '';
        foreach( array_reverse( str_split( $num ) ) as $i => $c ){
            $str .= ($i % 2 ? $c * 2 : $c);
        }
        return array_sum( str_split($str) ) % 10 == 0;

    }
}
