<?php
    require 'database.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $gender = $_POST['gender'];
    $topic = $_POST['topic'];
    $question = $_POST['question'];

    $query = $pdo->prepare("INSERT INTO question (name, email, birthday, gender, topic, description)
        VALUES (:name, :email, :year, :gender, :topic, :question)    
    ");

    $values = ['name' => $name, 'email' => $email, 'year' => $year, 'gender' => $gender, 'topic' => $topic, 'question' => $question];

    try {
        $query->execute($values);

        setcookie("name", $name, time() + 3600);
        setcookie("email", $email, time() + 3600);
        setcookie("year", $year, time() + 3600);
        setcookie("gender", $gender, time() + 3600);

        header('Location: /shop/index.php');

    } catch (PDOException $e) {
        header('Location: /shop/public/common.blocks/404.php');
    }