<?php
namespace Gelim\EMConfig;
use Gelim\EMConfig\Database\Repository\IConfigRepository;

require_once ("Utilities.php");
class EMConfig
{
    /** @var IConfigRepository */
    private $configRepo;
    private $scope;
    public function __construct($repo=null,$scope="default")
    {
        $this->scope = $scope;
        $this->configRepo = $repo??resolve(IConfigRepository::class);
    }

    public function init()
    {
        $this->configRepo->init(getDefaultConfigRow());
    }

    public function review()
    {
        $this->configRepo->review(getDefaultConfigRow());
    }

    public function resetValue($scope=null){
        $this->configRepo->resetValue(getDefaultConfigRow($scope));
    }

    public function get($key, $default, $scope="default")
    {

    }

    /**
     * @param string $scope
     * @return EMConfig
     */
    public function scope($scope){
        return new EMConfig($this->configRepo,$scope);
    }
}
