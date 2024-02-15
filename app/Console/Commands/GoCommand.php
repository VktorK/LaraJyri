<?php

namespace App\Console\Commands;

use App\Models\Executor;
use App\Models\StatusOfTransaction;
use App\Models\Transaction;
use App\Models\User;
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
        $user = Executor::first();
        dd($user->orders->toArray());
    }
}
