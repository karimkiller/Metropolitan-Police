<?php

return [
  'mysql' => [
    'host' => '127.0.0.1',
    'port' => '3306',
    'username' => 'root',
    'password' => '',
    'db' => 'Metropolitan_police',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'initialise_charset' => true,
    'initialise_collation' => true,
  ],
  'remember' => [
    'cookie_name' => 'nl2',
    'cookie_expiry' => 604800,
  ],
  'session' => [
    'session_name' => '2user',
    'admin_name' => '2admin',
    'token_name' => '2token',
  ],
  'core' => [
    'hostname' => 'localhost',
    'path' => 'roster',
    'friendly' => true,
    'force_https' => false,
    'force_www' => true,
    'captcha' => false,
    'date_format' => 'd M Y, H:i',
    'trustedProxies' => NULL,
    'installed' => true,
  ],
  'email' => [
    'email' => 'scorametropolitanpolice@gmail.com',
    'username' => 'scorametropolitanpolice@gmail.com',
    'password' => 'Metropolitan22',
    'name' => 'Metropolitan watcher',
    'host' => 'smtp.gmail.com',
    'port' => 587,
  ],
];