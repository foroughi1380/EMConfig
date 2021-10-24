<?php
namespace Gelim\EMConfig;
use Gelim\EMConfig\Database\Models\Configuration;
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

    public function get($key, $default=null, $scope=null)
    {
        $scope = $scope??$this->scope;
        $this->configRepo->get($scope,$key,$default);
    }
    public function getRaw($key, $scope=null)
    {
        $scope = $scope??$this->scope;
        $this->configRepo->getRow($scope,$key,null);
    }

    public function set($scope, $key, $value)
    {
        return $this->configRepo->set($key,$value,$scope);
    }

    public function keys($scope){
        return $this->configRepo->keys($scope);
    }

    public function scopes()
    {
        return $this->configRepo->scopes();
    }

    public function scopesKeysRaw($scope)
    {
        return $this->configRepo->scopesKeysRaw($scope);
    }

    /**
     * @param string $scope
     * @return EMConfig
     */
    public function scope($scope){
        return new EMConfig($this->configRepo,$scope);
    }
}
