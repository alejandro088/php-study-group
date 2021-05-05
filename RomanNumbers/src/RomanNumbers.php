<?php
namespace Roman;

class RomanNumbers
{
    public function __construct()
    {
    }

    public function decimalToRoman($number)
    {
        /* 1990 = [  1   ,     9,     9,    0]
                    a[0]    a[1]    a[2]    a[3]
                  1=M        1=C    1=X     1=I
                  2=MM       2=CC   2=XX    2=II
                  3=MMM     3=CCC   3=XXX   3=III
                            4=CD    4=XL    4=IV
                            5=D     5=L     5=V
                            6=DC    6=LX    6=VI
                            7=DCC   7=LXX   7=VII
                            8=DCCC  8=LXXX  8=VIII
                            9=CM     9=XC    9=IX

         1000=M 900=CM 90=XC */

        $array  = array_map('intval', str_split($number));
        $left = 4-sizeof($array);

        for ($i=1; $i <= $left; $i++) {
            array_unshift($array, 0);
        }

        $this->numberRoman = $this->parseNumRoman($array[0], "M");
        $this->numberRoman .= $this->parseNumRoman($array[1], "C", "D", "M");
        $this->numberRoman .= $this->parseNumRoman($array[2], "X", "L", "C");
        $this->numberRoman .= $this->parseNumRoman($array[3], "I", "V", "X");

        return $this->numberRoman;
    }

    public function parseNumRoman($digit, $letter, $letterFive = '', $letterNext = '')
    {
        $str = '';
        switch ($digit) {
            case in_array($digit, range(1, 3)):
                $str = str_repeat($letter, $digit);
                break;
            case 4:
                $str = $letter . $letterFive;
                break;
            case 5:
                $str = $letterFive;
                break;
            case in_array($digit, range(6, 8)):
                $str = $letterFive.str_repeat($letter, $digit-5);
                break;
            case 9:
                $str = $letter . $letterNext;
                break;
            
            
            default:
                # code...
                break;
        }

        return $str;
    }
}
