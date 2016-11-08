<?php

// Контент страницы
        $title = "Задание topface!"; // Заголовок
// Название и пункты меню
        $en_menu = 'hide'; // для показа меню есть два свойства show или hide.
        $title_menu = " "; // заголовок меню
        $title_content_page = "Привет topface!";
        $content_page = "

              <p>Для решения этого задания я выбрал следущее:
              <br> - Язык PHP
              <br> - БД Mysql
              <br> - Дизайн сделал на Lite фреймворке, он доступен <a href='https://getmdl.io/components/index.html' target='blank'>тут</a>.
                <p>Для решения задачи я создал свой шаблон, который разбил на состовляющие(header, content, menu, content) и все файлы шаблона положил в каталог template/</p>
                <p>Так же было принято решение создать файл конфигурации в котором будут прописанны основные параметры приложения, например подключение к БД. Я положил его в каталог config/ и назвал db.php</p>
                <p>Для хранения информации о пользователях я выбрал Mysql.</p>
              <br>
              <br>

        ";

// Подключение шаблона
        include("template/!tmp_header.php"); // хэдер
        include("template/!tmp_menu.php"); // меню
        include("template/!tmp_content.php"); // контент страницы
        include("template/!tmp_footer.php"); // футер

?>
