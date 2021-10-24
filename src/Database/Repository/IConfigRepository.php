<?php
namespace Gelim\EMConfig\Database\Repository;

interface IConfigRepository
{
    public function get($scope, $key, $default=null);

    public function getRow($scope, $key, $default = null);

    public function set($key, $value, $scope);

    public function scopes();

    public function scopesKeysRaw($scope);

    public function keys($scope=null);

    public function init($values);

    public function review($values);

    public function resetValue($values);
}
