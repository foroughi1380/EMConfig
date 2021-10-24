<?php

namespace Gelim\EMConfig;

function getDefaultConfigRow()
{
    $configs = config("configSet");
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
