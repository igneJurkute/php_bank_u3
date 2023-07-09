<?php

$users = [
    ['name' => 'Jonas', 'email' => 'jonas@gmail.com', 'password' => md5('123456')],
    ['name' => 'Ignė', 'email' => 'igne@gmail.com', 'password' => md5('123')]
];

file_put_contents(__DIR__ . '/users.json', json_encode($users));

echo "\n users.json created \n";