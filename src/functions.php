<?php
namespace Gelim\EMConfig;

if (! function_exists(__NAMESPACE__ . '\configs')){
    function configs($scope="")
    {
        return new ConfigAccessor($scope);
    }
}


