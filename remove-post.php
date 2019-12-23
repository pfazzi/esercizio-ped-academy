<?php
require_once 'bootstrap.php';

$title = $_GET['title'];
$repo->remove($title);

header('Location: index.php');
