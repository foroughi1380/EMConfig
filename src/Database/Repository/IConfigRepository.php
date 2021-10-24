<?php
namespace Gelim\EMConfig\Database\Repository;

interface IConfigRepository
{
    public function get($scope, $key, $default=null);

    public function set($key, $value, $scope, $type=null);

    public function scope($scope);

    public function keys($scope=null);

    public function factoryReset($values);

    public function init($values);

    public function review($values);
}
