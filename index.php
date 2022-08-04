<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8"/>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="public/assets/css/main.css"/>
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
                            "<a class = 'category' href='public/common.blocks/category.php?cat_id=".$cat[0]."'>$cat[1] ($cat[2])</a>";
                    }
                ?>
            </div>
            <form class="feedback" method="post" action="app/formSend.php">
                <?php if (isset($_COOKIE['name'])) {
                    echo
                    "<div class='feedback__field'>
                        <label for='name'>Имя</label>
                        <input type='text' name='name' size='20' maxlength='20' value='".htmlspecialchars($_COOKIE["name"])."' required/>
                    </div>";
                } else
                    echo
                    "<div class='feedback__field'>
                        <label for='name'>Имя</label>
                        <input type='text' name='name' size='20' maxlength='20' required/>
                    </div>"; ?>

                <div class="feedback__field">
                    <label for="email">Почта</label>
                    <input type="email" name="email" size="30" maxlength="30" required/>
                </div>
                
                <div class="feedback__field">
                    <label for="year">Год</label>
                    <select name="year" size="1">
                        <option selected>2000</option>
                        <option>1999</option>
                        <option>1998</option>
                        <option>1997</option>
                        <option>1996</option>
                        <option>1995</option>
                        <option>1994</option>
                        <option>1993</option>
                        <option>1994</option>
                        <option>1993</option>
                        <option>1992</option>
                        <option>1991</option>
                        <option>1990</option>
                    </select>
                </div>
        
                <div class="feedback__field">
                    <div class="feedback__gender">
                        <input type="radio" name="gender" value="radio_female" checked/>
                        <label for="radio_female">Женщина</label>

                        <input type="radio" name="gender" value="radio_male"/>
                        <label for="radio_male">Мужчина</label>

                        <input type="radio" name="gender" value="radio_unknown"/>
                        <label for="radio_unknown">Нечто</label>
                    </div>
                </div>

                <div class="feedback__field">
                    <label for="topic">Тема обращения</label>
                    <input type="text" name="topic" size="40" maxlength="40" required/>
                </div>
                
                <div class="feedback__field">
                    <label for="question">Суть вопроса</label>
                    <textarea rows="4" cols="24" name="question" size="255" maxlength="255" required></textarea>
                </div>
                
                <script>
                function agreeForm(f) {
                    if (f.checkbox_rules.checked) f.submit.disabled = 0 
                    else f.submit.disabled = 1
                }</script>

                <div class="feedback__field">
                    <div class="feedback__agree">
                        <input type="checkbox" name="checkbox_rules" onclick="agreeForm(this.form)" required/>
                        <label for="checkbox_rules">С контрактом ознакомлен</label>
                    </div>
                </div>
                
                <div class="feedback__field">
                    <input type="submit" value="Отправить" name="submit" disabled/>
                </div>
            </form>
        </main>
    </body>
</html>