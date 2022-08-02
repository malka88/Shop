<?php
    require 'database.php';

    $query = $pdo->prepare("SELECT c.category_id, c.name, COUNT(pac.product_id) AS count
        FROM category c
        JOIN product_and_category pac
        ON c.category_id = pac.category_id
        JOIN product p
        ON pac.product_id = p.product_id AND p.is_active = 1
        GROUP BY c.category_id
        ORDER BY count DESC
    ");

    $query->execute();
    $categories = $query->fetchAll();