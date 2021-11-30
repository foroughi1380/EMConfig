<?php

namespace Gelim\EMConfig;

class EMConfigSetManager
{
    public function add($scope, $key, $value)
    {
        try {
            $type = Utilities::getValueType($value);

            config(['YOURKONFIG.YOURKEY' => 'NEW_VALUE']);
            $fp = fopen(base_path() . '/config/' . EMConfig::CONFIG_FILE_NAME . '.php', 'r+');

            $find = false;
            $s = -1;
            while (!$find) {
                fseek($fp, --$s, SEEK_END);
                $find = fread($fp, 2) == "];";
            }


            fseek($fp, $s, SEEK_END);

            fwrite($fp, <<< ali
                                '$scope' => [
                                    '$key'=>[
                                                'type' => '$type',
                                                'value'=> '$value'
                                            ]
                                ]\n];
                            ali
            );
            fclose($fp);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }
}
