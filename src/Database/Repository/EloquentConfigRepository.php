<?php

namespace Gelim\EMConfig\Database\Repository;

use Gelim\EMConfig\Database\Models\Configuration;
use Gelim\EMConfig\Database\Repository\IConfigRepository;

class EloquentConfigRepository implements IConfigRepository
{


    public function init($values)
    {
        Configuration::upsert($values , ['key'] , ['extras', 'type', 'title', 'description']);
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

    public function factoryReset($values)
    {
    }
}
