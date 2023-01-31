<?php

include 'functions.php';
include 'Database.php';

$config = include('config.php');

$db = new Database($config['database']);

$id = $_GET['id']; 
$query = "SELECT * FROM posts where id = :id";

$posts = $db->query($query, [':id' => $id])->fetch();


dd($posts);