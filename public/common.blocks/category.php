<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8"/>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/css/main.css"/>
        <!-- BACKEND -->
        <?php require '../../app/category.php';?>

        <title><?php echo $category[0][0]; ?></title>
    </head>
    <body>
        <main class="main">
            <h1 class="main__title"><?php echo $category[0][0]; ?></h1>
            <a href="/shop"><img src="../assets/img/arrow_back.svg"/></a>
            <div class="cards">
                <?php
                    foreach ($products as $p) {
                        echo
                            "<div class='card'>
                            <a href='../common.blocks/product.php?id=".$p[0]."'>
                                <img src='../".$p[3]."' class='card__image' alt='".$p[4]."'/>
                            </a>
                            <div class='card__name'>
                                $p[1]
                            </div>
                            <div class='card__category'>
                                $p[2]
                            </div>
                            </div>";
                    }
                ?>
                </div>
                <div class='cards__nav'>
                <?php
                    $num = ceil($count[0][0] / 12);
                    if($num > 1) {
                        for ($i = 1; $i <= $num; $i++){
                            if($i == 1) echo "<a class = 'cards__nav-item' href='/shop/public/common.blocks/category.php?cat_id=".$_GET['cat_id']."'>".$i."</a>";
                            else echo "<a class = 'cards__nav-item' href='/shop/public/common.blocks/category.php?cat_id=".$_GET['cat_id']."&page=".$i."'>".$i."</a>";
                        }
                    }
                ?>
                </div>
        </main>
    </body>
</html>