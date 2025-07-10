<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Client;

echo "Total clients: " . Client::count() . "\n";

$latestClient = Client::latest()->first();
if ($latestClient) {
    echo "Latest client:\n";
    echo "- Name: " . $latestClient->first_name . " " . $latestClient->last_name . "\n";
    echo "- Birth Date: " . ($latestClient->birth_date ?? 'null') . "\n";
    echo "- Case: " . ($latestClient->Case ?? 'null') . "\n";
} else {
    echo "No clients found\n";
}
