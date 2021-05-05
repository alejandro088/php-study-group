<?php
namespace Test;

use Roman\RomanNumbers2;
use PHPUnit\Framework\TestCase;

class RomanNumberTest extends TestCase
{
    public function test_if_can_convert_number_decimal_to_roman()
    {
        $romanNumber = new RomanNumbers2();
        
        $this->assertEquals(
            'MCMXC',
            $romanNumber->decimalToRoman(1990)
        );
    }
}
