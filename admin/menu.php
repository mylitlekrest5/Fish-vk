<? if(!isset($_SESSION['admin'])) { 
echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/admin/auth.php">';
}

echo '<li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/main.png"></i>
                  <p>Главная</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a href="links.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/link.png"></i>
                  <p>Ссылки на фейки</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a href="spamers.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/spam.png"></i>
                  <p>Спамеры</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a href="rupor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/ryp.png"></i>
                  <p>Объявление спамерам</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a href="viborkaspam.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/logs.png"></i>
                  <p>Логи спамера</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
			  
               <li class="nav-item">
                <a href="export.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/text.png"></i>
                  <p>Экспорт аккаунтов</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
			  <li class="nav-item">
                <a href="viborka.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/viborka.png"></i>
                  <p>Выборка по критериям</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
			 
			  <li class="nav-item">
                <a href="settings.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"><img src="images/sett.png"></i>
                  <p>Настройки</p>
				  <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
                </a>
              </li>
              <li class="nav-item">
              <a href="banvk.php" class="nav-link">
                <i class="fa fa-circle-o nav-icon"><img src="images/blockvk.png"></i>
                <p>Заблокировать ВК</p>
        <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
              </a>
            </li>
            <li class="nav-item">
            <a href="massmsg.php" class="nav-link">
              <i class="fa fa-circle-o nav-icon"><img src="images/massmsg.png"></i>
              <p>Рассылка в беседе</p>
      <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
            </a>
          </li>
          <li class="nav-item">
          <a href="traffic.php" class="nav-link">
            <i class="fa fa-circle-o nav-icon"><img src="images/traffic.png"></i>
            <p>Трафик аккаунтов</p>
            <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
           </a>
          </li>
            <li class="nav-item">
            <a href="telegram.php" class="nav-link">
              <i class="fa fa-circle-o nav-icon"><img src="images/telegram.png"></i>
              <p>Уведомления в ТГ</p>
              <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
             </a>
            </li>
              <li class="nav-item">
              <a href="https://t.me/fish_dark" target="_blank" class="nav-link">
                <i class="fa fa-circle-o nav-icon"><img src="images/telegramch.png"></i>
                <p>ТГ с обновлениями</p>
                <i class="fa fa-circle-o nav-icon"><img src="images/right.png"></i>
              </a>
            </li>
		  '; ?>