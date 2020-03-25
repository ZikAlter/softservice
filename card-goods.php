<?php
require_once('php/connect.php'); // соединение с БД
$num_str = (int) $_GET['id']; // полученный id является числом
$num_str = trim($num_str); // удаляем лишние пробелы
$num_str = strip_tags($num_str); // удаляем html теги
$num_str = stripslashes($num_str); // удаляем экранирование
$num_str = htmlspecialchars($num_str); // преобразуем html теги в символы

$stmt = $con_li->prepare( "SELECT * FROM programm WHERE id = ?" ); // подготавливаем наш запрос
$stmt->bind_param( "i", $num_str ); // подготовка переменных
$stmt->execute(); // выполняем подготовленный запрос
$result = $stmt->get_result(); // получаем результат из подготовленного запроса
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
	<link rel="stylesheet" href="css/normalize.css">
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
			<li class="nav-menu-cont-item"><a href="soft.php">Софт и ПО</a></li>
			<li class="nav-menu-cont-item"><a href="vacancy.html">Вакансии</a></li>
			<li class="nav-menu-cont-item"><a href="contact.html">Контакты</a></li>
		</ul>
	</nav>
</header>
<main>
	<?php
    if(mysqli_num_rows($result) <= 0 ){ // если страница не найдена выводим сообщение что контент не найден
    ?>
    	<div class="container">
    		<h1>Ошибка! Контент не найден...</h1>
    	</div>
    <?php
    }
    else{ // если страница найдена
      $info_prog = mysqli_fetch_assoc($result); // присваиваем информацию в переменную
    ?>
    	<section class="block-softprogramm container">
    		<h2 class="block-softprogramm-h2"><?php echo $info_prog['title_programm']; ?></h2>
    		<div class="block-softprogramm-card">
    			<div class="block-softprogramm-card-left"><img src="files/<?php echo $info_prog['img_programm']; ?>" alt="" class="card-left-img"></div>
    			<div class="block-softprogramm-card-right">
    				<h2 class="card-right-h2">Цена: <?php echo $info_prog['price']; ?><i class="fas fa-ruble-sign"></i></h2>
    				<p class="col-mvideo"><b>Товар в наличии</b></p>
    				<h3>Характеристики</h3>
    				<p><b class="bord-dotted">Тип программы:</b> <?php echo $info_prog['type_programm']; ?></p>
    				<p><b class="bord-dotted">Производитель:</b> <?php echo $info_prog['manufacturer']; ?></p>
    				<p><b class="bord-dotted">Срок лицензии:</b> <?php echo $info_prog['license_term']; ?></p>
    				<p><b class="bord-dotted">Совместимость с ОС:</b> <?php echo $info_prog['compatibility']; ?></p>
    				<p><b class="bord-dotted">Комплект:</b> <?php echo $info_prog['set_programm']; ?></p>
    			</div>
    		</div>
    		<div class="block-descript-programm">
    			<p><?php echo $info_prog['description']; ?></p>
    		</div>
    	</section>
    <?php
	}
    ?>
</main>
<footer>
	<div class="footer-block container">
		<div class="footer-block-autor">
			<p>&copy 2020, ООО "Софт-Сервис"</p>
			<p>Web-дизаин и разработка: Дмитрий Проскуряков</p> 
		</div>
		<div class="menu-social">
			<ul class="menu-social-cont">
				<li class="menu-social-cont-item"><a href="https://vk.com/" target="_blank" title="VK группа"><i class="fab fa-vk fa-2x col-vk"></i></a></li>
				<li class="menu-social-cont-item"><a href="https://ok.ru/" target="_blank" title="OK группа"><i class="fab fa-odnoklassniki fa-2x col-ok"></i></a></li>
				<li class="menu-social-cont-item"><a href="https://www.instagram.com/" target="_blank" title="Instagram профиль"><i class="fab fa-instagram fa-2x col-instagram"></i></a></li>
			</ul>
		</div>
	</div>
</footer>
</body>
</html>