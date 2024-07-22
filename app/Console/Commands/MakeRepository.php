<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name} {--i}';

    protected $description = 'Create a new repository class and optionally an interface';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $interfaceFlag = $this->option('i');

        $this->createRepository($name);

        if ($interfaceFlag) {
            $this->createInterface($name);
        }
    }

    protected function createRepository($name)
    {
        $path = app_path("Repositories/{$name}.php");

        if ($this->files->exists($path)) {
            $this->error("Repository {$name} already exists!");
            return;
        }

        $stub = $this->files->get(__DIR__ . '/stubs/repository.stub');
        $stub = str_replace('{{name}}', $name, $stub);

        $this->files->put($path, $stub);

        $this->info("Repository {$name} created successfully.");
    }

    protected function createInterface($name)
    {
        $path = app_path("Repositories/Interfaces/{$name}Interface.php");

        if ($this->files->exists($path)) {
            $this->error("Interface {$name}Interface already exists!");
            return;
        }

        $stub = $this->files->get(__DIR__ . '/stubs/interface.stub');
        $stub = str_replace('{{name}}', $name, $stub);

        $this->files->put($path, $stub);

        $this->info("Interface {$name}Interface created successfully.");
    }
}
