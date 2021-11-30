<?php
namespace Gelim\EMConfig;
use Gelim\EMConfig\Database\Models\Configuration;
use Gelim\EMConfig\Database\Repository\IConfigRepository;

require_once ("Utilities.php");
class EMConfig
{
    public const CONFIG_FILE_NAME = "configSet";
    /** @var IConfigRepository */
    private $configRepo;
    private $scope;
    public function __construct($repo=null,$scope="default")
    {
        //defines scope
        $this->scope = $scope;
        $this->configRepo = $repo??resolve(IConfigRepository::class);
    }

    public function init()
    {
        $this->configRepo->init(Utilities::getDefaultConfigRow());
    }

    public function review()
    {
        $this->configRepo->review(Utilities::getDefaultConfigRow());
    }

    public function resetValue($scope=null,$resetAll=false){
        $scope = $scope??$this->scope;
        if ($resetAll) $scope = null;
        $this->configRepo->resetValue(Utilities::getDefaultConfigRow($scope));
    }

    public function get($key, $default=null, $scope=null)
    {
        $scope = $scope??$this->scope;
        return $this->configRepo->get($scope,$key,$default);
    }
    public function getRaw($key, $scope=null)
    {
        $scope = $scope??$this->scope;
        return $this->configRepo->getRow($scope,$key,null);
    }

    public function set($key, $value, $scope=null)
    {
        return $this->configRepo->set($key,$value,$scope);
    }

    public function keys($scope=null){
        $scope = $scope??$this->scope;
        return $this->configRepo->keys($scope);
    }

    public function scopes()
    {
        return $this->configRepo->scopes();
    }

    public function scopesKeysRaw($scope=null)
    {
        $scope = $scope??$this->scope;
        return $this->configRepo->scopesKeysRaw($scope);
    }

    /**
     * @param string $scope
     * @return EMConfig
     */
    public function scope($scope){
        return new EMConfig($this->configRepo,$scope);
    }

    public function getAll()
    {
        return $this->configRepo->all();
    }
}
