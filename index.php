<?php

require 'function.php';

// require 'router.php';

require 'Database.php';


$config = require 'config.php';

// dd($config['database']);

// connect to our MySQL database
$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);

$id = $_GET['id'];

// $query = "select * from posts where id= {$id}"; // do not insert inline variable input into sql query directly
// $query = "select * from posts where id= ?"; // first way
$query = "select * from posts where id= :id"; // second way

$posts = $db->query($query, [':id' => $id])->fetchAll();

foreach($posts as $post) {
    echo "<li>".$post['title']."</li>";
}