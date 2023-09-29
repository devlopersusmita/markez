<?php

return [
    'api_key' => "V8wP_gitSaqfQe9vAYhMEA",
    'api_secret' => 'MyZsDsc7hURuIGM0JpVIkBZ291bbE13LweML',
    'base_url' => 'https://api.zoom.us/v2/',
    'token_life' => 60 * 60 * 24 * 7, // In seconds, default 1 week
    'authentication_method' => 'jwt', // Only jwt compatible at present but will add OAuth2
    'max_api_calls_per_request' => '5' // how many times can we hit the api to return results for an all() request
];
// ZOOM_CLIENT_KEY ="V8wP_gitSaqfQe9vAYhMEA"
// ZOOM_CLIENT_SECRET="MyZsDsc7hURuIGM0JpVIkBZ291bbE13LweML"
