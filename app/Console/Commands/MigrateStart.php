<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make migrate fresh and passport install';

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
        try {
            Artisan::call('migrate:fresh --seed');
            Artisan::call('passport:install');
            $this->info('Database migrated and seeded successfully');
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
