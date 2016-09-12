<?php

return [
    'id' => [
        'text' => 'ID',
        'trans' => 'public',
        'sort' => true,
        'data-field' => 'id',
        'db_field' => 'id'
    ],
    'username' => [
        'text' => 'username',
        'trans' => 'public',
        'sort' => true,
        'data-filed' => 'username',
        'db_field' => 'username'
    ],
    'role_id' => [
        'text' => 'User',
        'trans' => 'public',
        'sort' => true,
        'data-field' => 'role_id',
        'db_field' => 'role_id',
        'join' => true,
        'custom_value' => 'echo @$value["rol"]["title"];'
    ],
];