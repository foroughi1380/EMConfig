<?php
namespace Gelim\EMConfig\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static void init()
 * @method static void review()
 */
class EMConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "emconfing-config";
    }
}
