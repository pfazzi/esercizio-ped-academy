<?php

require_once 'post.class.php';
require_once 'bootstrap.php';

$title = $_POST['title'];
$post = new Post($title);

$repo->save($post);

header('Location: index.php');

