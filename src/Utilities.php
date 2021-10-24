<?php

namespace Gelim\EMConfig;

function getDefaultConfigRow($scope = null)
{
    $configs = config("configSet");
    if ($scope){
        $configs=[$scope => $configs[$scope]];
    }
    $ret = [];


    foreach ($configs as $scope => $keys) {
        foreach ($keys as $key => $value) {
            $ret[] = [
                "scope" => $scope,
                "key" => $key,
                "type" => $value['type'],
                "extras" => $value['value'],
                "title" => $value['title'],
                "description" => $value['description'],
            ];
        }
    }

    return $ret;
}
