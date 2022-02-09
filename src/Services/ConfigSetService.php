<?php
namespace Gelim\EMConfig\Services;
use Gelim\EMConfig\EMConfig;
use Gelim\EMConfig\Utilities;
use function PHPUnit\Framework\isNull;

class ConfigSetService{

    function getDefaultConfigs($arr = null, $scope = ""){
        $ret = [];

        if (is_null($arr)){
            $arr = config(EMConfig::CONFIG_FILE_NAME);
        }

        foreach($arr as $key => $item){
            $config = [];

            $hasType = isset($item['type']);
            $hasValue= isset($item['value']);
            $hasChildes= isset($item['childes']) && is_array($item['childes']);

            if ($hasValue){
                $config['value'] = $item['value'];
                $config['type'] = $hasType ? $item['type'] : Utilities::getValueType($item['value']);
            }else if ($hasType){
                $config['value'] = null;
                $config['type'] = $item['type'];
            }

            if ($hasChildes){
                $ret = array_merge(
                    $this->getDefaultConfigs($item['childes'], $scope === "" ? $key : $scope . '->' . $key) ,
                    $ret);
                unset($item['childes']);
            }

            unset($item['type']);
            unset($item['value']);




            if ($config || $item){
                $config['key'] = $key;
                $config['extras'] = $item;
                $config['scope'] = $scope;
                $ret[] = $config;

            }
        }

        return $ret;
    }
}
