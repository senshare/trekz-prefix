<?php

return [
    'proxies' => env('TRUSTED_PROXIES', '*'), // Use '*' to trust all proxies or specify your proxy IPs
    'headers' => \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_FOR |
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_HOST |
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PROTO |
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PORT |
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PREFIX,
];
