<?php
    require 'database.php';

    $id = $_GET['id'];

    $query = $pdo->prepare("SELECT p.name, p.description, p.price, p.price_promo, p.price_discount
        FROM product p
        WHERE p.product_id = :product_id       
    ");

    $query2 = $pdo->prepare("SELECT pic.path, pic.alt
        FROM picture pic
        JOIN product_and_picture pap
        ON pic.picture_id = pap.picture_id AND pap.product_id = :product_id 
        ORDER BY pap.is_main DESC    
    ");

    $query3 = $pdo->prepare("SELECT c.category_id, c.name
        FROM category c
        JOIN product_and_category pac
        ON c.category_id = pac.category_id AND pac.product_id = :product_id 
        ORDER BY pac.is_main DESC
    ");

    $prod_id = ['product_id' => $id];

    try {
        $query->execute($prod_id);
        $query2->execute($prod_id);
        $query3->execute($prod_id);

        $product = $query->fetchAll();
        $pictures = $query2->fetchAll();
        $categories = $query3->fetchAll();
        if(!$product || !$pictures || !$categories) {
            header('Location: http://localhost/shop/public/404.php');
        }

    } catch (PDOException $e) {
        header('Location: http://localhost/shop/public/404.php');
    }