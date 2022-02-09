<?php

return [

    "maintenance" => [
        'type' => "boolean",
        "value" => false,
    ],

    "sms"=>[
        "value" => true,
        "childes"=>[
            "number" => [
                "type" => "string",
                "value" => "0313252",
            ],
            "welcomeText" => [
                "type" => 'string',
                "value" => "Welcome to our site"
            ]
        ]
    ],


    "account" => [
        "childes" => [
            "usename" => [
                "type" => "string"
            ],
            "description" => [
                "type" => "multiline"
            ],
        ]
    ]


];
