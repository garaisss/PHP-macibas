<?php

$config = include base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (! Validator::string($_POST['body'], 1, 300)){
        $errors['body'] = 'A Note Of No More Than 300 Characters Is Required!';}
    
    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

    
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);