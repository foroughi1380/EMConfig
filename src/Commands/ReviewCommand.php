<?php

namespace Gelim\EMConfig\Commands;

use Gelim\EMConfig\Facades\EMConfig;
use Illuminate\Console\Command;

class ReviewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emconfig:review';

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
        EMConfig::review();
        return Command::SUCCESS;
    }
}
