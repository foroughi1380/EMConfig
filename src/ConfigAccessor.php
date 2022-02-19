<?php
declare(strict_types=1);

namespace Gelim\EMConfig;


class ConfigAccessor{

    private $scope = "";
    private $key = "";

    public function __construct($scope="" , $key="")
    {
        $this->key = $key;
        $this->scope = $scope;
    }

    public function __call(string $name, array $arguments)
    {
        $config = \Gelim\EMConfig\Facades\EMConfig::get($this->scope,$this->key);

        if (! $config){
            return $arguments['default']??null;
        }

        if (in_array($name, ['value', 'type'])){
            return $config->$name;
        }else{
            return $config->extras[$name];
        }

    }

    public function __get(string $name)
    {
        return new ConfigAccessor($this->scope, $name);
    }

    public function setScope($scope)
    {
        $this->scope = $scope;
    }

}



