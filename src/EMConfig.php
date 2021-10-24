<?php
namespace Gelim\EMConfig;
use Gelim\EMConfig\Database\Repository\IConfigRepository;

require_once ("Utilities.php");
class EMConfig
{
    public function init()
    {
        /** @var IConfigRepository $repo */
        $repo = resolve(IConfigRepository::class);
        $rows = getDefaultConfigRow();
        $repo->init($rows);
    }

    public function get($key, $default, $scope="default")
    {

    }
}
