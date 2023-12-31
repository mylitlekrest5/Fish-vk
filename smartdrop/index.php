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
		<b>КОРОБКА “Топчик”</b>
		<span>НАИЛУЧШИЙ ТОВАР iMac Pro</span>
	</div>
	<div class="case case-iphone">
		<div class="case-full">
			<div class="case-name">Топчик</div>
			<a href="../auth/index.php" class="case-button">ОТКРЫТЬ КОРОБКУ</a>
			<div class="case-all"><b>2834 ВЫДАНО </b>ПРЕДМЕТОВ</div>
			<div class="case-rub"><b>1000</b>руб.</div>
			<div class="case-title">КОРОБКА СОДЕРЖИТ 56 ПРЕДМЕТОВ:</div>
			<div class="clear"></div>
			<ul class="case-item">
									<li><img src="http://s018.radikal.ru/i516/1711/7d/0e8a2322aab8.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i637/1711/4d/60ae0ea4adb4.png" alt=""></li>
									<li><img src="http://s015.radikal.ru/i332/1711/46/5fa524ae2f0d.png" alt=""></li>
									<li><img src="http://s013.radikal.ru/i324/1711/eb/b7976ff7e9e4.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i614/1711/31/b1a221f478b2.png" alt=""></li>
									<li><img src="http://s42.radikal.ru/i096/1711/6d/0461d7e30de9.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i507/1711/fe/83f08b6f7443.png" alt=""></li>
									<li><img src="http://s015.radikal.ru/i332/1711/0a/3eb5e2a9fae1.png" alt=""></li>
									<li><img src="http://s11.radikal.ru/i183/1711/d0/26eefe8e8b5b.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i627/1711/9b/5e3c820dd420.png" alt=""></li>
									<li><img src="http://s015.radikal.ru/i332/1711/76/4ae1899737fe.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i637/1711/07/0161cf283162.png" alt=""></li>
							</ul>
		</div>
	</div>
 
	<div class="game-title">
		<b>КОРОБКА “Тяжеловес”</b>
		<span>НАИЛУЧШИЙ ТОВАР Apple Watch Series 3</span>
	</div>
	<div class="case case-apple case-right">
		<div class="case-full">
			<div class="case-name">Тяжеловес</div>
			<a href="../auth/index.php" class="case-button">ОТКРЫТЬ КОРОБКУ</a>
			<div class="case-all"><b>843 ВЫДАНО </b>ПРЕДМЕТОВ</div>
			<div class="case-rub"><b>500</b>руб.</div>
			<div class="case-title">КОРОБКА СОДЕРЖИТ 35 ПРЕДМЕТОВ:</div>
			<div class="clear"></div>
			<ul class="case-item">
									<li><img src="http://s019.radikal.ru/i606/1711/63/a1131952f03e.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i638/1711/47/4cd77bc05332.png" alt=""></li>
									<li><img src="http://s11.radikal.ru/i183/1711/59/fd44654c303d.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i502/1711/0a/989510a59d29.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i620/1711/76/0cf910a91ded.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i523/1711/98/9f4f803e5faa.png" alt=""></li>
									<li><img src="http://s02.radikal.ru/i175/1711/61/e7041d9a6166.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i642/1711/5b/f2702fbc6b18.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i622/1711/c5/2e2db3541f30.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i625/1711/23/7ef07e7813ac.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i520/1711/07/7b20053def4e.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i526/1711/c7/b17aac2decf0.png" alt=""></li>
							</ul>
		</div>
	</div>
 
	<div class="game-title">
		<b>КОРОБКА “Среднячок”</b>
		<span>НАИЛУЧШИЙ ТОВАР Sony playstation 4 500 Gb</span>
	</div>
	<div class="case case-ps">
		<div class="case-full">
			<div class="case-name">Среднячок</div>
			<a href="../auth/index.php" class="case-button">ОТКРЫТЬ КОРОБКУ</a>
			<div class="case-all"><b>1055 ВЫДАНО </b>ПРЕДМЕТОВ</div>
			<div class="case-rub"><b>250</b>руб.</div>
			<div class="case-title">КОРОБКА СОДЕРЖИТ 33 ПРЕДМЕТОВ:</div>
			<div class="clear"></div>
			<ul class="case-item">
									<li><img src="http://s018.radikal.ru/i508/1708/4e/3a2ff6248bda.png" alt=""></li>
									<li><img src="http://s012.radikal.ru/i319/1708/ea/da610febc22c.png" alt=""></li>
									<li><img src="http://s016.radikal.ru/i335/1708/d9/e828f0c2e2f6.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i507/1708/08/9386e64c1a24.png" alt=""></li>
									<li><img src="http://s46.radikal.ru/i111/1708/74/260af56765fc.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i515/1708/5d/6325c2dbeb44.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i524/1711/ef/9c5cb1416a81.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i514/1708/1d/b4626c7ce469.png" alt=""></li>
									<li><img src="http://s013.radikal.ru/i323/1708/1f/73b959a1c84a.png" alt=""></li>
									<li><img src="http://s014.radikal.ru/i328/1708/02/3a47e0aec224.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i624/1708/47/5f23b0897e92.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i641/1708/a1/292619b7b9e7.png" alt=""></li>
							</ul>
		</div>
	</div>
 
	<div class="game-title">
		<b>КОРОБКА “Новичок”</b>
		<span>НАИЛУЧШИЙ ТОВАР Гироскутер</span>
	</div>
	<div class="case case-gs case-right">
		<div class="case-full">
			<div class="case-name">Новичок</div>
			<a href="../auth/index.php" class="case-button">ОТКРЫТЬ КОРОБКУ</a>
			<div class="case-all"><b>9509 ВЫДАНО </b>ПРЕДМЕТОВ</div>
			<div class="case-rub"><b>100</b>руб.</div>
			<div class="case-title">КОРОБКА СОДЕРЖИТ 41 ПРЕДМЕТОВ:</div>
			<div class="clear"></div>
			<ul class="case-item">
									<li><img src="http://s019.radikal.ru/i639/1711/cc/d56594f02493.png" alt=""></li>
									<li><img src="http://s018.radikal.ru/i517/1711/65/27a173217a52.png" alt=""></li>
									<li><img src="http://s016.radikal.ru/i334/1711/a9/4989e3560d51.png" alt=""></li>
									<li><img src="http://s011.radikal.ru/i317/1711/7c/e2f813e9688c.png" alt=""></li>
									<li><img src="http://i053.radikal.ru/1711/7d/aeac21a3fdc6.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i641/1711/3c/082cb8c33615.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i612/1711/36/debbb0d6bb73.png" alt=""></li>
									<li><img src="http://s46.radikal.ru/i111/1711/82/640eacb75f3b.png" alt=""></li>
									<li><img src="http://i056.radikal.ru/1708/53/20e88c180ab4.png" alt=""></li>
									<li><img src="http://i062.radikal.ru/1711/99/9671d7086cee.png" alt=""></li>
									<li><img src="http://s019.radikal.ru/i627/1711/5b/b4961c3f8b53.png" alt=""></li>
									<li><img src="http://s012.radikal.ru/i319/1711/c6/5d23429bd6df.png" alt=""></li>
							</ul>
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