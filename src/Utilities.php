<?php

namespace Gelim\EMConfig;

class Utilities{
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
        if (!$value) {
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
