<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service {$name} already exists!");
            return false;
        }

        File::ensureDirectoryExists(dirname($path));

        File::put($path, $this->getStub($name));

        $this->info("Service {$name} created successfully.");
    }

    protected function getStub($name)
    {
        return <<<EOT
<?php

namespace App\Services;

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
