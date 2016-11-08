<?php

// Контент страницы
        $title = "Авторизация пользователя"; // Заголовок
// Название и пункты меню
        $en_menu = 'hide'; // для показа меню есть два свойства show или hide.
        $title_menu = " "; // заголовок меню
        $title_content_page = "Авторизация пользователя";
        $content_page = "
        <center>
            <form action='classes/App.php'  method='POST'>
              <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input class='mdl-textfield__input' type='text' name='flogin' minlength='4' required pattern='^[a-zA-Z]+$'>
                <label class='mdl-textfield__label' for='sample3'>Логин</label>
              </div>
              <br>
              <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input class='mdl-textfield__input' type='password' name='fpassword' minlength='6' required>
                <label class='mdl-textfield__label' for='sample3'>Пароль</label>
                <input type='hidden' name='act' value='login'>
              </div>
              <br>
              <button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'>
                  Войти
              </button>
            </form>
        </center>

        ";

// Подключение шаблона
        include("template/!tmp_header.php"); // хэдер
        include("template/!tmp_menu.php"); // меню
        include("template/!tmp_content.php"); // контент страницы
        include("template/!tmp_footer.php"); // футер
        response_once("App.php");

?>