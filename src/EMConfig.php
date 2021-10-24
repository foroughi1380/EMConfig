<?php
namespace Gelim\EMConfig;
use Gelim\EMConfig\Database\Repository\IConfigRepository;

require_once ("Utilities.php");
class EMConfig
{
    /** @var IConfigRepository */
    private $configRepo;

    public function __construct()
    {
        $this->configRepo = resolve(IConfigRepository::class);
    }

    public function init()
    {
        $this->configRepo->init(getDefaultConfigRow());
    }

    public function review()
    {
        $this->configRepo->review(getDefaultConfigRow());
    }

    public function resetValue(){
        $this->configRepo->resetValue(getDefaultConfigRow());
    }

    public function get($key, $default, $scope="default")
    {

    }
}
