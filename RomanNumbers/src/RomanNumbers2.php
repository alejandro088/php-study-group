<?php
namespace Roman;

class RomanNumbers2
{
    
    const LETTERS = [ "IVX", "XLC", "CDM", "M" ];
    
    private $digits;

    private $start;

    private $numberRoman;

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
        
        
        //initilize attributes for new call.
        $this->start = 0;
        $this->numberRoman = '';

        $this->digits  = array_map('intval', str_split($number));
        
        for ($i=sizeof($this->digits)-1; $i >= 0; $i--) { 
            $this->numberRoman = $this->parseNumRoman($i) . $this->numberRoman;        
        }

        return $this->numberRoman;
    }

    public function parseNumRoman($pos)
    {
        $letters = $this::LETTERS[$this->start];
        $digit = $this->digits[$pos];
        $str = '';

        switch ($digit) {
            case in_array($digit, range(1, 3)):
                $str = str_repeat($letters[0], $digit);
                break;
            case 4:
                $str = $letters[0] . $letters[1];
                break;
            case 5:
                $str = $letters[1];
                break;
            case in_array($digit, range(6, 8)):
                $str = $letters[1].str_repeat($letters[0], $digit-5);
                break;
            case 9:
                $str = $letters[0] . $letters[2];
                break;
            
            
            default:
                # code...
                break;
        }

        $this->start++;

        return $str;
    }
}
