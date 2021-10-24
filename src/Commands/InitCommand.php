<?php

namespace Gelim\EMConfig\Commands;

use Gelim\EMConfig\Facades\EMConfig;
use Illuminate\Console\Command;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emconfig:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove all records in table and insert default value from config file';

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
        EMConfig::init();
        return Command::SUCCESS;
    }
}
