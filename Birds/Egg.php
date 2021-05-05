<?php

class Egg
{
    private $type;

    private $isHatched = false;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function hatch()
    {
        if ($this->isHatched) {
            throw new Exception("This egg has already been hatched");
        }
        
        $this->isHatched = true;
        return new $this->type();
    }
}
