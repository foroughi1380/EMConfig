<?php

namespace Gelim\EMConfig\Commands;

use Gelim\EMConfig\Facades\EMConfig;
use Illuminate\Console\Command;

class ResetValueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emconfig:resetValue {scope?} {--a|all : reset all scopes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set all config value to default value';

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
        EMConfig::resetValue($this->argument("scope"), $this->option("all"));
        return Command::SUCCESS;
    }
}
