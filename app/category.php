<?php
    require 'database.php';

    $id = $_GET['cat_id'];

    if(!isset($_GET['page'])){
        $page = 0;
    } 
    else {
        $page = ($_GET['page'] - 1) * 12;
    }

    $query1 = $pdo->prepare("SELECT COUNT(pac.product_id) AS count
        FROM product_and_category pac
        WHERE pac.category_id = :category_id
    ");

    $query = $pdo->prepare("SELECT c.name, c.description
        FROM category c
        WHERE c.category_id = :category_id    
    ");

    $query2 = $pdo->prepare("SELECT p.product_id, p.name, c.name AS category, pic.path, pic.alt
        FROM product p
        JOIN product_and_category pac
        ON pac.product_id = p.product_id AND p.is_active = 1
        JOIN category c
        ON pac.category_id = c.category_id AND pac.is_main = 1 
        JOIN product_and_category pac2
        ON p.product_id = pac2.product_id AND pac2.category_id = :category_id
        JOIN product_and_picture pap
        ON p.product_id = pap.product_id
        JOIN picture pic
        ON pap.picture_id = pic.picture_id AND pap.is_main = 1
        LIMIT 12 
        OFFSET :page_nam
    ");

    $cat_id = ['category_id' => $id];

    try {
        $query1->execute($cat_id);
        $query->execute($cat_id);
        $query2->bindParam('category_id', $id, PDO::PARAM_INT);
        $query2->bindParam('page_nam', $page, PDO::PARAM_INT);
        $query2->execute();

        $count = $query1->fetchAll();
        $category = $query->fetchAll();
        $products = $query2->fetchAll();

        if(!$count || !$category || !$products) {
            header('Location: /shop/public/common.blocks/404.php');
        }

    } catch (PDOException $e) {
        header('Location: /shop/public/common.blocks/404.php');
        exit;
    }