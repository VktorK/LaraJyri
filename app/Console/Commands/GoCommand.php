<?php

namespace App\Console\Commands;

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

        $valueOne = 10;
        $valueTwo = 20;

        $transactions = Transaction::sucTransactions($valueOne,$valueTwo)->get();
        dd($transactions->toArray());
    }
}

