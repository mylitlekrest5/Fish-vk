<?php session_start();
include('../bdlog.php');

if(isset($_GET['reff'])) {
	$_SESSION['comment'] = $_GET['reff'];
	$sessref = $_SESSION['comment'];
} else {
	$sessref = 'non-ref';
}?>

<!doctype html>
<html lang="ru">
<head>
	<title>SMART-DROP</title>
	<meta charset="utf-8" />
	<meta name="csrf-token" content="fE4QiUOengBqcuknfuFD9jlUZiN5q2M1p8sUcZc9">
	<link rel="stylesheet" type="text/css" href="css/animate.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery.arcticmodal-0.3.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/socket.js"></script>
	<script src="//ulogin.rujs/ulogin.js"></script>
</head>
<body>
	<div class="inputs">
		<div class="inputs_info inputs_green alert-success" style="display:none;">
			<div class="close"></div>
			<em></em>
		</div>
		<div class="inputs_info inputs_red alert-error" style="display:none;">
			<div class="close"></div>
			<em></em>
		</div>
	</div>
	<div style="display:none;">
		<div class="modal" id="modal">
			<div class="modal-title">ПОПОЛНЕНИЕ БАЛАНСА</div>
			<div class="center"><input type="text" placeholder="100" class="modal-input orders_sum" /></div>
			<button type="submit" class="modal-button orders_create">ПОПОЛНИТЬ</button>
		</div>
	</div>	
	<div class="wrapper">
		<div class="header">
			<a href="index.php" class="logo"></a>
			<ul class="nav">
				<li><a href="index.php">МАГАЗИН</a></li>
				<li><a href="gome.php">ДОСТАВКА</a></li>
				<li><a href="../auth/index.php">ВКОНТАКТЕ</a></li>
				<li><a href="help.php">ПОМОЩЬ</a></li>
			</ul>
			<ul class="stats">
				<li><b class="users">9427</b> пользователей</li>
				<li><b class="cases">14241</b> открыто коробок</li>
			</ul>
						<div id="uLogin" class="login" data-ulogin="display=buttons;fields=first_name,last_name,email,verified_email;optional=photo_big,bdate,sex;providers=vkontakte;hidden=;redirect_uri=http://smart-drop.ru/auth/ulogin">
				<a href="../auth/index.php" data-uloginbutton="vkontakte">ВОЙТИ НА САЙТ</a>
			</div>
					</div>
		<div class="live">
			<ul class="live-ul">
								<li><img src="https://b.radikal.ru/b34/1803/3d/93c8619d9006.png" alt="" /></li>
								<li><img src="https://b.radikal.ru/b04/1805/10/b0000d7652a9.png" alt="" /></li>
								<li><img src="http://s018.radikal.ru/i507/1711/fe/83f08b6f7443.png" alt="" /></li>
								<li><img src="https://b.radikal.ru/b34/1803/3d/93c8619d9006.png" alt="" /></li>
								<li><img src="https://b.radikal.ru/b04/1805/10/b0000d7652a9.png" alt="" /></li>
								<li><img src="http://s11.radikal.ru/i183/1711/d0/26eefe8e8b5b.png" alt="" /></li>
								<li><img src="https://b.radikal.ru/b34/1803/3d/93c8619d9006.png" alt="" /></li>
								<li><img src="http://s46.radikal.ru/i111/1708/74/260af56765fc.png" alt="" /></li>
								<li><img src="http://s018.radikal.ru/i507/1711/fe/83f08b6f7443.png" alt="" /></li>
								<li><img src="http://s012.radikal.ru/i319/1711/c6/5d23429bd6df.png" alt="" /></li>
							</ul>
		</div>
		<div class="container">
		<div class="game-title">
	<b>Доставка :</b>
	<span></span>
</div>
<div class="profile-full">

Как заказать товар,полученный из коробок?<br>
Чтобы заказать товары,которые вам выпали из коробок:<br>
1.Перейдите на страницу вашего профиля и заполните анкету для доставки товаров.<br>
2.Перейдите в раздел"Мои товары".<br>
3.У каждого предмета есть кнопка "Продать".<br>
4.Предметы в корзину перемещаются автоматически для оформления доставки нужно только нажать кнопку "Заказать доставку",либо вы можете продать товар обратно сайту.
<br><br>
Как отследить статус моей посылки?<br>
Перейдите в раздел "Мои доставки" на странице вашего профиля и отслеживайте изменение статуса заказа в удобной таблице.<br>
Также вы можете отследить посылку по номеру телефона который указали в анкете для получения посылки позвонив в Компанию "СДЕК"и спросив где находиться посылка. 
<br><br>
Сколько стоит доставка?<br>
Стоимость доставки для всех стран и регионов в среднем от300 до500 рублей зависит от количества товаров.Оплата доставки производиться Курьеру при получении посылки.
<br><br>
Сколько товаров можно заказать одновременно?<br>
Ограничений в количестве товаров нету.
<br><br>
Куда вы сможете доставить товары?<br>
Доставка производиться во все города России и страны СНГ.
<br><br>
Есть ли самовывоз?<br>
Самовывоза нет,все товары доставляются Курьерской службой"СДЕК" вам лично в руки.
<br><br>
Как быстро производиться доставка?<br>
Доставка товаров в пределах России производиться в течение 30 дней с момента оформления заказа через курьерскую службу "СДЕК".<br>
Заказы в Страны СНГ доставляются от 30 до 60 дней при помощи Курьерской службы "СДЕК" и выдаюся курьером лично вам в руки.
<br><br>
	</div>
</div>
		</div>
		<ul class="pay">
			<li><img src="images/pay/1.png" alt=""></li>
			<li><img src="images/pay/2.png" alt=""></li>
			<li><img src="images/pay/3.png" alt=""></li>
			<li><img src="images/pay/4.png" alt=""></li>
			<li><img src="images/pay/5.png" alt=""></li>
			<li><img src="images/pay/6.png" alt=""></li>
		</ul>
		<div class="footer">
			<span>ВСЕ ПРАВА ЗАЩИЩЕНЫ &copy; 2017-2021</span>
			<br>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript">
	</script>
</html>