<?php

namespace Config;

use App\Filters\AuthFilter;
use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'        => CSRF::class,
        'toolbar'     => DebugToolbar::class,
        'honeypot'    => Honeypot::class,
        'auth'        => AuthFilter::class,
    ];

    public array $globals = [
        'before' => [
            // CSRF can be enabled here if it is already configured in your CI4 project.
        ],
        'after' => [
            'toolbar',
        ],
    ];
}
