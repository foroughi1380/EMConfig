<?php

use Illuminate\Support\Facades\Facade;

class Config extends Facade
{
    protected static function getFacadeAccessor()
    {
        parent::getFacadeAccessor();
        return "emconfig-config";
    }
}
