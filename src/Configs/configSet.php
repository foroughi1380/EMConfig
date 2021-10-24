<?php

return [
    /** default scope use it without set scope name */
    "default" => [
        "name" => [
            "title" => "the title",
            "description" => "the description",
            "type"  => "array",
            "value" => [
                "ali",
                "reza",
            ]
        ]
    ],

    /**
     * [scope name] : [
     *          [key] : [
     *                      "type"  : [array, integer, float, string, boolean, date, datetime, object],
     *                      "value" :  ""
     *                  ]
     * ]
     */
];
