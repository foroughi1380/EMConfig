<?php

namespace Gelim\EMConfig\Database\Repository;

use Gelim\EMConfig\Database\Models\Configuration;
use Gelim\EMConfig\Database\Repository\IConfigRepository;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Config;

class EloquentConfigRepository implements IConfigRepository
{

    public function resetValue($values)
    {
        foreach ($values as $value){
            $config = Configuration::query()
                ->where("scope" , $value['scope'])
                ->where("key" , $value['key'])
                ->firstOrCreate();
            $config->extras = $value['extras'];
            $config->save();
        }
    }

    public function review($values)
    {
        foreach ($values as $value){
            $count = Configuration::query()
                ->where("scope" , $value['scope'])
                ->where("key" , $value['key'])
                ->count();
            if ($count == 0){
                (new Configuration($value))->save(); // normal form don't cast
            }
        }
    }

    public function init($values)
    {
        Configuration::query()->delete();

        foreach ($values as $value){
            (new Configuration($value))->save();
        }

//        Configuration::upsert($values , ['key'] , ['extras', 'type', 'title', 'description']);
    }

    public function get($scope, $key, $default = null)
    {
    }

    public function set($key, $value, $scope, $type = null)
    {
    }

    public function scope($scope)
    {
    }

    public function keys($scope = null)
    {
    }


}
