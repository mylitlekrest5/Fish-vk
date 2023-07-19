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
	<b>Помощь:</b>
	<span></span>
</div>
<div class="profile-full">
         
Как пополнить баланс?<br>
Нажмите кнопку"+" и "пополнить"в верхней части сайта.<br>
Откроется список возможных способов оплаты.<br>
После завершения оплаты вы будете перенаправлены обратно на сайт и сможете открыть коробки 
и заказать доставку.
<br><br>
Как быстро зачисляются средства?<br>
Все платежи зачисляются мгновенно после оплаты.
<br><br>
Можно выводить деньги?<br>
Нет.Баланс можно тратить только на открытие коробок.
<br><br>
Открытие коробок:<br>
Как это работает?<br>
На сайте расположено 4 коробки.Открывая коробку вы получаете один из предметов, который можете заказать с доставкой на дом или продать.
Стоимость открытия коробки всегда одинаковая,независимо от того,какой вам выпал предмет.Таким образом,вы можете получить дорогие и интересные товары 
по очень низким ценам.
<br><br>
Мне точно выпадет какой-то товар??<br>
Открывая коробку мы гарантируем ,что вы точно получите один из товаров.
<br><br>
Как открыть коробку и получить товар?<br>
1.Нажмите кнопку "Войти на сайт"<br>
2.Пополните баланс на сумму, необходимую для открытия коробки.<br>
3.Перейдите на страницу открытия коробки и нажмите кнопку "Открыть коробку".<br>
4.С вашего баланса а сайте будет автоматически списана стоимость открытия коробки.<br>
5.Подождите пока лента с товарами остановиться и определиться товар, который вапал именно вам!<br>
6.Решите что делать с товаром - продать или заказать доставку.<br>
<br>
Каким образом выпадает товар?<br>
Определение товара происходит случайным образом. Никто заранее не знает когда выпадет тот или иной товар.    <br>  
<br>
Можно ли вернуть ненужный товар и еще раз открыть коробку?<br>
Да!После открытия коробки, если вам выпал товар, который у вас уже есть или просто вам не нужен - вы можете его вернуть нажать <br>
кнопку "Продать" на странице коробки или в разделе "Мои товары" на странице вашего профиля.<br>
Стоимость продажи завасит от ценности товара и может быть как больше,так и меньше стоимости открытия коробки. 
<br>
Как заказать доставку товаров? <br>

Подрубную информацию об условиях и порядке получения товаров вы можете прочитать на странице "Доставка".<br>

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