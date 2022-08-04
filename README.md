# Shop
 
SQL-инъекции:
Для защиты от инъекций использовались подготовленные запросы. Благодаря им все специальные символы автоматически экранируются, и в базу данных поступают уже обработанные строки.
Пример:
$query = $pdo->prepare("SELECT c.name, c.description
FROM category c
WHERE c.category_id = :category_id ");

$cat_id = ['category_id' => $id];

$query->execute($cat_id);

XSS:
Для защиты от XSS также подойдет способ выше, но помимо него можно использовать strip_tags или htmlspecialchars. Первая вырезает все html теги, а вторая преобразует все специальные символы в коды. 

Пример:
htmlspecialchars($_COOKIE["name"]) //для вывода информации из куков