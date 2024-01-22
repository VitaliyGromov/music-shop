<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class DropAllTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all tables';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if (! $this->confirm('ARE YOU REALLY WANT TO DROP ALL TABLES IN DATABASE? [y|N]')) {
            exit('Drop Tables command aborted');
        }

        Schema::dropAllTables();

        $this->comment('ALL TABLE DROPPED');
    }
}
