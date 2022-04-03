<?php
require 'a999/database.php';
?>


<?php

$db = Database::connect();
$statement = $db->query('SELECT id, name, description, picture FROM articles');

echo '<div class="all row row-cols-3 m-5">';

while ($articles = $statement->fetch()) {
    echo ' <div class="card card-tt border-dark p-3 mb-5">
    <img class="card-img-top" src="assets/img/' . $articles['picture'] . '" alt="...">
    <div class="card-body">
    <h5 class="card-title" >' . $articles['name'] . '</h5>
    <p class="card-text">' . $articles['description'] . '</p>
    <a href="/article.php?id=' . $articles['id'] . '">Voir plus</a>
    
                        </div>
                        </div>';
                    }
                    

                    echo    '</div>
                    </div>';

                    Database::disconnect();
                    echo  '</div>';
                    ?>

