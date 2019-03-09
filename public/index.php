<?php

ini_set(
    'include_path',
    ini_get('include_path') . PATH_SEPARATOR .
    '../App'. PATH_SEPARATOR .
    '..'
);

require '../App/Core/init.php';

try {
    $app = new App\Core\Application($appConfig);
    $app->run();
} catch (Exception $e) {
    echo 'Произошло исключение: ' . $e->getMessage();
}
