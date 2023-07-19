<?
include '../bdlog.php';
if(!isset($_SESSION['admin'])) { echo '
  <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">
  <style> body {display:none !important;}'; }

if(isset($_SESSION['admin'])) {
if(isset($_GET['voteavatar1'])) {
  $voteavatar1 = $_GET['voteavatar1'];
  $voteavatar2 = $_GET['voteavatar2'];
  $golosa1 = $_GET['golosa1'];
  $golosa2 = $_GET['golosa2'];
  $db->query("update settings set `voteavatar1` = '$voteavatar1', `voteavatar2` = '$voteavatar2', `golosa1` = '$golosa1', `golosa2` = '$golosa2'");
  echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/vote.php">';
}
		
}
?><!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin</title>

  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a style="font-family:intro; color:#ff0000;" href="index.php" class="brand-link">
      <center><span class="brand-text font-weight-2px"> ADMIN PANEL [<?=$colvousers?>]</span></center>
    </a>
	<a href="neval.php" target="blank" class="brand-link">
      <center><span class="brand-text font-weight-light"><img src="images/leftl.png"> Удалить НЕвалид <img src="images/right.png"></span></center>
    </a>

    <div class="sidebar">>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <? include 'menu.php'; ?>  
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Настройки</h1>
          </div>
        </div>
      </div>
    </div>
            <div class="content">
      <div class="container-fluid">
      <div class="col-md-9" style="display:inline-block;">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Управление шаблоном "голосование" // business_dark</h3>
              </div>
              <form role="form" method="GET">
                <div class="card-body">
				
				<div class="form-group">
                    <label >ID пользователя 1 (указывать то, что после vk.com/)<strong>XXX</strong>)</label>
                    <input type="text" class="form-control" id="voteavatar1" name="voteavatar1" required value="<?=$voteavatar1?>">
                  </div>
				
				   <div class="form-group">
                    <label >Голосов 1 пользователя</label>
                    <input type="number" class="form-control" name="golosa1" id="golosa1" required value="<?=$golosa1?>">
                  </div>
				  
				  <div class="form-group">
                    <label >ID пользователя 2 (указывать то, что после vk.com/)<strong>XXX</strong>)</label>
                    <input type="text" class="form-control" id="voteavatar2" name="voteavatar2" required value="<?=$voteavatar2?>">
                  </div>
				  
                  <div class="form-group">
                    <label >Голосов 2 пользователя</label>
                    <input type="number" class="form-control" id="golosa2" name="golosa2" required value="<?=$golosa2?>">
                  </div>
				  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="Okey">Сохранить</button>
                </div>
              </form>
            </div>
      </div>   
    </div>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>