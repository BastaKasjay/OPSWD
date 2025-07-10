<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Client;

echo "=== Client Birth Date Test ===\n";
echo "Total clients: " . Client::count() . "\n\n";

// Get the last 3 clients to check their birth_date
$clients = Client::latest()->take(3)->get();

foreach ($clients as $client) {
    echo "Client: " . $client->first_name . " " . $client->last_name . "\n";
    echo "  Birth Date: " . ($client->birth_date ?? 'null') . "\n";
    echo "  Case: " . ($client->Case ?? 'null') . "\n";
    echo "  Created: " . $client->created_at . "\n\n";
}
