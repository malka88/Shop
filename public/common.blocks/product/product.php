<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8"/>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../../main.css"/>
        <!-- SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="zoom.js" defer></script>
        <script src="counter.js" defer></script>
        <script src="cart.js" defer></script>
        <!-- BACKEND -->
        <?php require '../../../app/product.php';?>

        <title><?php echo $product[0][0]; ?></title>
    </head>
    <body>
        <main class="main">
            <div class="main__back-links">
            <?php 
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $parts = parse_url($_SERVER['HTTP_REFERER']);
                    parse_str($parts['query'], $query);

                    if($categories[0][0] == $query['cat_id']) {
                        echo "<a href='http://localhost/shop/public/common.blocks/category/category.php?cat_id=".$query['cat_id']."'><img src='../../assets/img/arrow_back.svg'/></a>";
                    }
                    else {
                        echo "<a href='http://localhost/shop/public/common.blocks/category/category.php?cat_id=".$categories[0][0]."'><img src='../../assets/img/arrow_back.svg'/></a>";
                        $cat_name;
                        foreach($categories as $c) {
                            if($c[0] == $query['cat_id']){
                                $cat_name = $c[1];
                                break;
                            }
                        }
                        echo "<a class='main__link' href='http://localhost/shop/public/common.blocks/category/category.php?cat_id=".$query['cat_id']."'>$cat_name</a>";
                    }
                }
                else echo "<a href='http://localhost/shop/public/common.blocks/category/category.php?cat_id=".$categories[0][0]."'><img src='../../assets/img/arrow_back.svg'/></a>";
            ?>
            </div>
            <div class="product">
                <!-- BLOCK WITH IMAGES -->
                <div class="product__images">
                    <div class="product__slider">
                    <?php foreach ($pictures as $p) {
                        echo "
                            <img src='../../".$p[0]."' class='product__additional-image' alt='".$p[1]."'/>
                        ";
                        }?>
                    </div>
                    <?php echo "
                        <img src='../../".$pictures[0][0]."' class='product__main-image' alt='".$p[0][1]."'/>
                    ";?>
                </div>
                <!-- BLOCK WITH INFORMATION -->
                <div class="product__info">
                    <?php echo "
                        <h1 class='product__title'>".$product[0][0]."</h1>
                    ";?>
                    <div class="product__categories">
                        <?php foreach ($categories as $c) {
                            echo "
                                <a class='product__link' href='http://localhost/shop/public/common.blocks/category/category.php?cat_id=".$c[0]."'>$c[1]</a>
                            ";
                        }?>
                    </div>
                    <div class="product__prices">
                        <?php
                            if($product[0][4] != NULL && $product[0][3] != NULL) {
                                echo "
                                    <span class='product__price product__price--old'>".$product[0][2]."</span>
                                    <span class='product__price product__price--new-irrelevant'>".$product[0][4]."</span>
                                    <span class='product__space'></span>
                                    <span class='product__price'>".$product[0][3]."</span>
                                    <span class='product__promocode'>
                                        — с промокодом
                                    </span>
                                ";
                            } elseif ($product[0][4] != NULL) {
                                echo "
                                    <span class='product__price product__price--old'>".$product[0][2]."</span>
                                    <span>class='product__space'</span>
                                    <span class='product__price'>".$product[0][4]."</span>
                                ";
                            } else {
                                echo "
                                    <span class='product__price'>".$product[0][2]."</span>
                                ";
                            }
                            ?>
                    </div>
                    <div class="product__avilable">
                        <div class="product__avilable-item">
                            <img class="product__avilable-icon" src="../../assets/img/Layer 99.svg"/>
                            <span class="product__avilable-label">В наличии в магазине&nbsp</span>
                            <div>
                                <a class="product__link" href="#">Lamoda</a>
                            </div>
                        </div>
                        <div class="product__avilable-item">
                            <img class="product__avilable-icon" src="../../assets/img/Layer 100.svg"/>
                            <span class="product__avilable-label">Бесплатная доставка</span>
                        </div>
                    </div>
                    <div class="product__counter">
                        <button class="product__amount-button product__amount-button--minus" onclick="decrement()">-</button>
                        <input class="product__amount" type="number" value="1" step="1" min="1" max="10" readonly>
                        <button class="product__amount-button" onclick="increment()">+</button>
                    </div>
                    <div class="product__actions">
                        <button class="product__button product__button--hilighted" onclick="addToCart()">Купить</button>
                        <button class="product__button">В избранное</button>
                    </div>
                    <?php echo "
                        <p class='product__description'>".$product[0][1]."</p>
                    ";?>
                    <div class="product__social">
                        Поделиться:
                        <a class="product__social-link" href="#" target="_blank">
                            <img src="../../assets/img/vk.png" alt="VK"/>
                        </a>
                        <a class="product__social-link" href="#" target="_blank">
                            <img src="../../assets/img/gmail.png" alt="Gmail"/>
                        </a>
                        <a class="product__social-link" href="#" target="_blank">
                            <img src="../../assets/img/facebook.png" alt="Facebook"/>
                        </a>
                        <a class="product__social-link" href="#" target="_blank">
                            <img src="../../assets/img/twitter.png" alt="Twitter"/>
                        </a>
                        <div class="product__social-counter">123</span>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>