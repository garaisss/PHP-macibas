<?php

include 'Validator.php';

$config = include 'config.php';
$db = new Database($config['database']);

$heading = 'Create Note';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if (! Validator::string($_POST['body'], 1, 300)){
        $errors['body'] = 'A Note Of No More Than 300 Characters Is Required!';}
    
    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

    
}

include 'views/notes/create.view.php';