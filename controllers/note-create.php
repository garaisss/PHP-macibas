<?php

$config = include('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if (strlen($_POST['body']) === 0){
        $errors['body'] = 'A Note Is Required';
    }

    if (strlen($_POST['body']) > 300){
        $errors['body'] = 'The note is way too long, has to be under 300 characters!';
    }

    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

    
}

include 'views/note-create.view.php';