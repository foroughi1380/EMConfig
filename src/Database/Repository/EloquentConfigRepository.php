<?php

namespace Gelim\EMConfig\Database\Repository;

use Gelim\EMConfig\Database\Models\Configuration;
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
                ->first();

            if ($config){
                $config->extras = $value['extras'];
                $config->save();
            }
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
        $config = $this->getRow($scope,$key);

        return $config? $config->extras : $default;
    }

    public function getRow($scope, $key, $default = null)
    {
        $config = Configuration::query()->where("scope", $scope)
            ->where("key", $key)
            ->first();

        return $config??$default;
    }

    public function set($key, $value, $scope)
    {
        $config = Configuration::query()->where("scope", $scope)
            ->where("key", $key)
            ->first();

        if ($config){
            $config->extras = $value;
            return $config->save();
        }

        return false;
    }

    public function keys($scope = null)
    {
        $query = DB::table("emconfig")->distinct();

        if ($scope){
            $query = $query->select(["key"])
                ->where("scope" , $scope);
        }else{
            $query = $query->select(["scope", "key"]);
        }
        return $query->get();
    }

    public function scopesKeysRaw($scope){
        return Configuration::query()->where("scope", $scope)->get();
    }

    public function scopes()
    {
        return DB::table("emconfig")->distinct()->select(["scope"])->get();
    }
}
