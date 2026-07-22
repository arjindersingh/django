<?php

require_once __DIR__ . '/views.php';

return [
    ['/blog', [BlogViewController::class, 'index']],
];
