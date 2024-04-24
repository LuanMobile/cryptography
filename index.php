<?php

use App\Core\Core;
use App\Http\Route;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/routes/api.php';

Core::dispatch(Route::routes());
