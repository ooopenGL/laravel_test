<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Welcome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "welcome {name} {age} {others*} {--city=}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $argv = $this->argument();
        $opt = $this -> options();
        var_dump($argv, $opt);
    }
}
