<?php
session_start();

// Контент страницы
        $title = "Регистрация пользователя"; // Заголовок
// Название и пункты меню
        $en_menu = 'hide'; // для показа меню есть два свойства show или hide.
        $title_menu = " "; // заголовок меню
        $title_content_page = "Регистрация пользователя";
        $content_page = "
        <center>
            <form action='classes/App.php' method='POST'>
              <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input class='mdl-textfield__input' type='text' name='fname' minlength='2' autocomplete='off' required pattern='^[а-яА-Я]+$'>
                <label class='mdl-textfield__label' for='sample3'>Имя пользователя(только русские буквы)</label>
              </div>
              <br>
              <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input class='mdl-textfield__input' type='text' name='flogin' minlength='4' autocomplete='off' required pattern='^[a-zA-Z0-9]+$'> 
                <label class='mdl-textfield__label' for='sample3'>Логин(только латинские буквы и цифры)</label>
              </div>
              <br>
              <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input class='mdl-textfield__input' type='password' name='fpassword' autocomplete='off' required>
                <label class='mdl-textfield__label' for='sample3'>Пароль(минимум 6 символов)</label> 
                <input type='hidden' name='act' value='singin'>
              </div>
              <br>
              <button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'>
                  Зарегистрировать
              </button>
            </form>
        </center>

        ";

// Подключение шаблона
        include_once("template/!tmp_header.php"); // хэдер
        include_once("template/!tmp_menu.php"); // меню
        include_once("template/!tmp_content.php"); // контент страницы
        include_once("template/!tmp_footer.php"); // футер

?>