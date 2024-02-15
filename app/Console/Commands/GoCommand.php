<?php

namespace App\Console\Commands;

use App\Models\StatusOfTransaction;
use App\Models\Transaction;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $statusOfTransactions = StatusOfTransaction::first();
        dd($statusOfTransactions->transactions->toArray());
    }
}
