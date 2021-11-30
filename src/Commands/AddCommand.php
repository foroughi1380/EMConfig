<?php

namespace Gelim\EMConfig\Commands;

use Gelim\EMConfig\Facades\EMConfig;
use Gelim\EMConfig\Facades\EMConfigSet;
use Illuminate\Console\Command;

class AddCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emconfig:add {scope} {key} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check config file and insert not exists config rows';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $result = EMConfigSet::add($this->argument("scope"), $this->argument("key"), $this->argument("value"));
        return $result ? self::SUCCESS : self::FAILURE;
    }
}
