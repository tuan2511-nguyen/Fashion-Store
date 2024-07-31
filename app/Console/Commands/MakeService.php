<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeService extends Command
{
    protected $signature = 'make:service {name} {--i}';

    protected $description = 'Create a new service class';

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

        $this->createService($name);

        if ($interfaceFlag) {
            $this->createInterface($name);
        }
    }

    protected function createService($name)
    {
        $path = app_path("Services/{$name}Service.php");

        if ($this->files->exists($path)) {
            $this->error("Service {$name}Service already exists!");
            return;
        }

        $stub = $this->files->get(__DIR__ . '/stubs/service.stub');
        $stub = str_replace('{{name}}', $name, $stub);

        $this->files->put($path, $stub);

        $this->info("Service {$name}Service created successfully.");
    }

    protected function createInterface($name)
    {
        $path = app_path("Interfaces/{$name}ServiceInterface.php");

        if ($this->files->exists($path)) {
            $this->error("Interface {$name}ServiceInterface already exists!");
            return;
        }

        $stub = $this->files->get(__DIR__ . '/stubs/interface.stub');
        $stub = str_replace('{{name}}', $name, $stub);

        $this->files->put($path, $stub);

        $this->info("Interface {$name}ServiceInterface created successfully.");
    }
}
