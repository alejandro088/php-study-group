<?php

require_once('BirdInterface.php');

abstract class Bird implements BirdInterface
{
    public function lay(){
        return new Egg(static::class);
    }
}