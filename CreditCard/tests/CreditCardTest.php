<?php
namespace Test;

use Card\CreditCard;
use PHPUnit\Framework\TestCase;

class CreditCardTest extends TestCase
{
    public function test_if_a_number_is_valid()
    {
        $creditCard = new CreditCard('4539 1488 0343 6467');
        
        $this->assertEquals(
            true,
            $creditCard->checkNumber()
        );
    }

    public function test_if_a_number_is_invalid()
    {
        $creditCard = new CreditCard('3439 1488 0343 6467');

        $this->assertEquals(
            false,
            $creditCard->checkNumber()
        );
    }
}
