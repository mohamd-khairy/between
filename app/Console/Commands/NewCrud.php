<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {crud}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make new crud';

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
        $upper_crud_name = $this->argument('crud');
        $small_crud_name = strtolower($upper_crud_name);
        $plural_crud_name = Str::plural($small_crud_name);

        Artisan::call('make:model ' . $upper_crud_name . ' -m');

        Artisan::call('make:controller Admin/' . $upper_crud_name . 'Controller');
        Artisan::call('make:controller Api/' . $upper_crud_name . 'Controller');

        Artisan::call('make:request Admin/' . $upper_crud_name . 'Request');
        Artisan::call('make:request Api/' . $upper_crud_name . 'Request');

        Artisan::call('make:resource ' . $upper_crud_name . 'Resource');

        File::makeDirectory(base_path('resources/views/admin/' . $plural_crud_name), 0777, true, true);
        File::copy(base_path('resources/views/admin/crud/index.blade.php'), base_path('resources/views/admin/' . $plural_crud_name . '/index.blade.php'));
        File::copy(base_path('resources/views/admin/crud/create.blade.php'), base_path('resources/views/admin/' . $plural_crud_name . '/create.blade.php'));
        File::copy(base_path('resources/views/admin/crud/edit.blade.php'), base_path('resources/views/admin/' . $plural_crud_name . '/edit.blade.php'));
        File::copy(base_path('resources/views/admin/crud/show.blade.php'), base_path('resources/views/admin/' . $plural_crud_name . '/show.blade.php'));

        $this->info($upper_crud_name . ' crud created successfully');
    }
}
