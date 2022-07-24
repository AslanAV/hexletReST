<?php

$users = [
    1 => ['name' => 'UserName'],
    2 => ['name' => 'UserName'],
    3 => ['name' => 'UserName'],
    4 => ['name' => 'UserName'],
];

$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($requestMethod) {
    case 'GET':
        var_dump($users);
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $users[$data['id']] = ['name' => $data['name']];
        var_dump($users);
    case 'DELETE':
        unset($users[json_decode(file_get_contents('php://input'), true)['id']]);
        var_dump($users);
    default:
        throw new \Exception('Unknown method');
}

