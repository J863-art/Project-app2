use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__.'/../bootstrap/app.php';

// Set host to 0.0.0.0 and capture port from environment (Railway provides PORT)
$host = '0.0.0.0';
$port = env('PORT', 8000);  // Railway injects PORT, use default 8000 for local testing

$app->make(Illuminate\Contracts\Http\Kernel::class)
    ->handle(Request::capture())
    ->send();

// Start the Laravel server manually (if needed) to listen on the correct host and port
$app->run($host, $port);
