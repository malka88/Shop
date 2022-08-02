<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8"/>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="public/main.css"/>
        <!-- SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- BACKEND -->
        <?php require 'app/categories.php';?>

        <title>Категории</title>
    </head>
    <body>
        <main class="main">
            <h1 class="main__title">Категории</h1>
            <div class="categories">
                <?php
                    foreach ($categories as $cat) {
                        echo
                            "<a class = 'category' href='public/common.blocks/category/category.php?cat_id=".$cat[0]."'>$cat[1] ($cat[2])</a>";
                    }
                ?>
            </div>
        </main>
    </body>
</html>