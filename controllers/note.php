<?php 

$config = include('config.php');

$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    include "views/note.view.php";