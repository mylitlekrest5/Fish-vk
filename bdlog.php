<? session_start();
header('Content-Type: text/html; charset=utf-8');

    $dbhost="localhost";
    $dbuser=""; // пользователь БД
    $dbpass=""; // пароль БД
    $db_name=""; // ИМЯ БД

$db = mysqli_connect($dbhost,$dbuser,$dbpass,$db_name);

mysqli_query($db, "SET NAMES utf8");
if (!$db) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
}



$host = 'http://'.$_SERVER['HTTP_HOST'].'/';

$settings = $db->query("SELECT * FROM settings");
while ($result = mysqli_fetch_array($settings)) {
		$admpas = $result['acceskey'];
		$admlogin = $result['login'];
		$tarif = $result['tarif'];
		$minbal = $result['minwith'];
        $ssilka = $result['url'];
        $textob = $result['textob'];
        $golosa1 = $result['golosa1'];
        $golosa2 = $result['golosa2'];
        $voteavatar1 = $result['voteavatar1'];
        $voteavatar2 = $result['voteavatar2'];
        $admintoken = $result['admintoken'];
        $group_id = $result['group_id'];
    }
	$statsmoney = $db->query("SELECT * FROM data");
	$colvousers = $statsmoney->num_rows;
	$date = new DateTime();
$timenow = $date->getTimestamp();
$db->set_charset("utf8");
mysqli_set_charset($db, "utf8");
echo '<style>body {background:#F4F6F9;}</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
?>