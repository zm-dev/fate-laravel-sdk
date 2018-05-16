<?php

return [
    'url' => env('FATE_URL', 'http://localhost:8080'),
    'rpc_hostname' => env('FATE_RPC_HOSTNAME', 'localhost:9090'),
    'app_id' => env('FATE_APP_ID'),
    'app_secret' => env('FATE_APP_SECRET'),
    'access_token_key' => 'access_token',
    'ticket_id_cookie_key' => 'ticket_id',
    'user_id_cookie_key' => 'user_id',
    'login_method' => 'redirect',
    'route' => [
        'callback' => '/fate/callback',
        'logout' => '/fate/logout',
        'options' => []
    ],
    // 单位：microseconds
    'rpc_timeout' => 3 * 1000 * 1000,
];
