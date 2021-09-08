<?php

namespace App\Console\Commands;

use App\Models\Vote;
use Illuminate\Console\Command;

class CheckVotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkvote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Vote validity';

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
        $votes = Vote::get();
        $invalid = [];

        foreach($votes as $vote) {
            if(!$vote->isValid) {
                $invalid[] = $vote;
            }
        }

        echo "\n" . count($invalid) . " invalid votes found.\n";

        return 0;
    }
}
