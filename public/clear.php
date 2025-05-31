<?php

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo '<pre>';

$kernel->call('config:clear');
echo "config:clear ejecutado\n";

$kernel->call('route:clear');
echo "route:clear ejecutado\n";

$kernel->call('cache:clear');
echo "cache:clear ejecutado\n";

$kernel->call('config:cache');
echo "config:cache ejecutado\n";

echo '</pre>';
