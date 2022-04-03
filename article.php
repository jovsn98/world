<?php
include('include/header.php');
require 'a999/database.php';

$db = Database::connect();
$statement = $db->query('SELECT id, name, year, authors, description, picture FROM articles WHERE id=' . $_GET['id']);




while ($article = $statement->fetch()) {
   echo '
   <div class="article-solo">
   <img class="img-solo" src="assets/img/' . $article['picture'] . '" alt=""/>
   <h2>' . $article['name'] . '</h2>
   <h5>' . $article['description'] . '</h2>
   <h5>' . $article['year'] . '</h2>
   <h5>' . $article['authors'] . '</h2>
   </div>';
}

include('include/footer.php');
