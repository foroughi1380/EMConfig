<?php

namespace Gelim\EMConfig;

class Utilities{

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
