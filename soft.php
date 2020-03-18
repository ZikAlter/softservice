<?php
require_once('php/connect.php'); // соединение с БД
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Описание сайта просто на будущее" />
	<title>"Софт-сервис"</title>
	<!-- Google fonts шрифты для сайта -->
	<link href="https://fonts.googleapis.com/css?family=Exo+2|Montserrat|Ubuntu|Play&display=swap" rel="stylesheet">
	<!-- Font Awesome иконки для сайта -->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  	<!-- Иконка сайта -->
  	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<!-- исправление стилей в некоторых браузерах -->
	<link rel="stylesheet" href="normalize.css">
	<!-- css файл -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- библиотека jQuery для работы плагинов и функционала на стороне клиента -->
	<script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
	<section class="logo-info container">
		<h1 class="logo-info-h1">Компьютерный салон: "Софт - Сервис"</h1>
		<p class="logo-info-address">Красноярский край, пгт. Курагино, ул. Комсомольская, 123</p>
		<p class="logo-info-phone">т. 2-21-88, 2-40-94</p>
	</section>
	<nav class="nav-menu container">
		<ul class="nav-menu-cont">
			<li class="nav-menu-cont-item"><a href="index.html">О нас</a></li>
			<li class="nav-menu-cont-item"><a href="news.html">Новости</a></li>
			<li class="nav-menu-cont-item"><a href="soft.php" class="active">Софт и ПО</a></li>
			<li class="nav-menu-cont-item"><a href="vacancy.html">Вакансии</a></li>
			<li class="nav-menu-cont-item"><a href="#">Контакты</a></li>
		</ul>
	</nav>
</header>
<main>
	<section class="block-goods container">
		<?php
        $load_goods = mysqli_query($con_li, "SELECT `id` , `title_programm` , `price` , `img_programm` FROM `programm` ORDER BY(`id`) DESC"); // sql запрос 
        $while_goods = mysqli_num_rows($load_goods); // подсчет числа товаров
        if ($while_goods > 0) { // если кол-во товара больше нуля
          while($info_card = mysqli_fetch_assoc($load_goods)){ // формируем массив для вывода товара
        ?>
		<div class="block-goods-card">
			<img src="files/<?php echo $info_card['img_programm'];?>" alt="" class="goods-card-img">
			<div class="block-goods-card-title">
				<h3><?php echo $info_card['title_programm'];?></h3>
			</div>
			<div class="block-goods-card-foot">
				<p class="goods-card-price"><?php echo $info_card['price'];?> <i class="fas fa-ruble-sign"></i></p>
				<a href="/book.php?id=<?php echo $info_card['id'];?>">
					<button class="goods-card-button">Подробнее</button>
				</a>
			</div>	
		</div>
		<?php
          }
        }
        else{ // если ничего нет то выводим сообщение
        ?>
        <h2>Список товаров не найден!</h2>
        <?php
        } 
        ?>
	</section>
</main>
<footer>
	<div class="footer-block container">
		<div class="footer-block-autor">
			<p>&copy 2020, ООО "Софт-Сервис"</p>
			<p>Web-дизаин и разработка: Дмитрий Проскуряков</p> 
		</div>
		<div class="menu-social">
			<ul class="menu-social-cont">
				<li class="menu-social-cont-item"><a href="https://vk.com/"><i class="fab fa-vk fa-2x col-vk"></i></a></li>
				<li class="menu-social-cont-item"><a href="https://ok.ru/"><i class="fab fa-odnoklassniki fa-2x col-ok"></i></a></li>
				<li class="menu-social-cont-item"><a href="https://www.instagram.com/"><i class="fab fa-instagram fa-2x col-instagram"></i></a></li>
			</ul>
		</div>
	</div>
</footer>
<script src="js/auto-height.js"></script>
<script type="text/javascript">
	GreatBalancer(".block-goods-card",".block-goods-card-title",".block-goods-card-foot");
</script>
</body>
</html>