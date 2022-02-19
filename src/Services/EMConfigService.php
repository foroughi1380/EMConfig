<?php

namespace Gelim\EMConfig\Services;

use Gelim\EMConfig\Database\Repository\IConfigRepository;

class EMConfigService
{
    public function init()
    {
        resolve(IConfigRepository::class)->init(resolve(ConfigSetService::class)->getDefaultConfigs());
    }
}
