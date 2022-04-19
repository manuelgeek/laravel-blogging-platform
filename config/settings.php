<?php

return [
    'user_types' => [
        'super-admin' => 'Super Admin',
        'admin' => 'Admin',
        'user' => 'User'
    ],
    'admin-user' => [
        'email' => 'admin@mail.com',
        'password' => env('ADMIN_PASSWORD', 'secret@15')
    ],
    'pagination' => 15,
    'posts-import-url' => 'https://sq1-api-test.herokuapp.com/posts'
];
