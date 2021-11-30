<?php

namespace Gelim\EMConfig;

class Utilities{
    public static function getDefaultConfigRow($scope = null)
    {
        $configs = config(EMConfig::CONFIG_FILE_NAME);
        if ($scope){
            $configs=[$scope => $configs[$scope]];
        }
        $ret = [];


        foreach ($configs as $scope => $keys) {
            foreach ($keys as $key => $value) {
                if (! is_array($value)){
                    $value = [
                        "value" => $value
                    ];
                }
                $ret[] = [
                    "scope" => $scope,
                    "key" => $key,
                    "type" => $value['type']??self::getValueType($value['value']),
                    "extras" => $value['value'],
                    "title" => $value['title']??"",
                    "description" => $value['description']??"",
                ];
            }
        }

        return $ret;
    }


    public static function getValueType($value)
    {
        $type = gettype($value);
        $type = strtolower($type);
        if (! in_array($type, EMConfigTypes::getAllTypes())){
            $type = EMConfigTypes::ANY_TYPE;
        }

        switch ($type){
            case EMConfigTypes::STRING_TYPE:
                if (strpos($value, "\n")){
                    $type = EMConfigTypes::MULTILINE_TYPE;
                }else if (self::isDate($value)){
                    $type = EMConfigTypes::DATE_TYPE;
                }
                break;
        }

        return $type;
    }

    static function isDate($value)
    {
        if (!$value || strlen($value) === 1) {
            return false;
        }

        try {
            new \DateTime($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
