<?php

use App\Kernel;

require_once dirname(__DIR__).'/Users/ben/project/Zoo_studi/public/index.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
