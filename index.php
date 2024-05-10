<?php

require 'function.php';

// require 'router.php';

require 'Database.php';


$config = require 'config.php';

// dd($config['database']);

// connect to our MySQL database
$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);

$posts = $db->query("select * from posts")->fetchAll();

foreach($posts as $post) {
    echo "<li>".$post['title']."</li>";
}