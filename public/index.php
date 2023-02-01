<?php

const BASE_PATH = __DIR__ . '/../';

include BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) {
    include base_path("Core/{$class}.php");
});

include base_path('router.php');