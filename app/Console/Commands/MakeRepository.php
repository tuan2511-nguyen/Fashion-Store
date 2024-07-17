<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository class';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Repositories/{$name}.php");

        if (File::exists($path)) {
            $this->error("Repository {$name} already exists!");
            return false;
        }

        File::ensureDirectoryExists(dirname($path));

        File::put($path, $this->getStub($name));

        $this->info("Repository {$name} created successfully.");
    }

    protected function getStub($name)
    {
        return <<<EOT
<?php

namespace App\Repositories;

class {$name}
{
    public function __construct()
    {
        // Constructor logic
    }

    // Add your methods here
}
EOT;
    }
}
