<?php

namespace Gelim\EMConfig;

class EMConfigTypes
{
    const ARRAY_TYPE = "array";
    const INTEGER_TYPE = "integer";
    const FLOAT_TYPE = "float";
    const STRING_TYPE = "string";
    const BOOLEAN_TYPE = "boolean";
    const DATE_TYPE = "date";
    const DATETIME_TYPE = "datetime";
    const OBJECT_TYPE = "object";
    const MULTILINE_TYPE = "multiline";
    const ANY_TYPE = "any";


    public static function getAllTypes()
    {
        return [
            self::ARRAY_TYPE,
            self::INTEGER_TYPE,
            self::FLOAT_TYPE,
            self::STRING_TYPE,
            self::BOOLEAN_TYPE,
            self::DATE_TYPE,
            self::DATETIME_TYPE,
            self::OBJECT_TYPE,
            self::MULTILINE_TYPE,
            self::ANY_TYPE,
        ];
    }

}
