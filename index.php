<?php
session_start();

// проверяем есть ли данные о пользователе
        if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
                $en_menu = 'show';
                $title_menu = "Привет, " . $_SESSION['name']; // приветствуем пользователя
        }
        else {
                $en_menu = 'hide'; // для показа меню есть два свойства show или hide.
        }

// Контент страницы
        $title = "Задание на должность junior developer в topface!"; // Заголовок
// Название и пункты меню
        $title_content_page = "Привет topface!";
        $content_page = "


              <br>мой ID: 1466091
              <br>Ко мне на почту поступила <a href='https://docs.google.com/forms/d/e/1FAIpQLSdVvA1aAxiMfK5F2Geu82da6JH1n9kIFRFnu4lyhoxWJegK6A/viewform?c=0&w=1'>эта</a> задача
              <p>Для решения задачи я выбрал следущее:
              <br> - PHP 7.0 так как он на 40% быстрее PHP 5.x
              <br> - БД выбрал Mysql, к с ней работаю в проекте с помощью PDO
              <br> - Дизайн сделал на Lite фреймворке, он доступен <a href='https://getmdl.io/components/index.html' target='blank'>тут</a>.
                <br>
                <br>Итак я изготовил проект с использование ООП, создал 2 класса App и DataBase, лежат в каталоге /classes
                <br> - App в нем реализовал метод для работы с пользователями(регистрация, авторизация и т.д.)
                <br> - Database в нем реализованны методы работы с БД(вставка, выборка, удаление и т.д.)
                <br>
                <br>По мимо этого созданны 4 страницы(лежат в корне) которые созданны с подключением файлов шаблонов:
                <br> - index это данная страница для вывода контента
                <br> - login для авторизации пользователей
                <br> - singin для регистрации пользователей
                <br> - admin для администратирования списка пользователей
                <br>
                <br>Файлы шалонов (header, content, menu, footer) и лежат в каталоге /template</p>
                <br> - header выводит 'Шапку сайта'
                <br> - content выводит контент старницы
                <br> - menu содержит пункты навигации
                <br> - footer это 'Низ сайта'
                <br>
                <br>Еще реализован перегруженный метод переадресации на страницы, который может переадрисовывать с сообщением
                <br>Вот собственно и получилось простое приложение
              <br>
              <br>

        ";

// Подключение шаблона
        include_once("template/!tmp_header.php"); // хэдер
        include_once("template/!tmp_menu.php"); // меню
        include_once("template/!tmp_content.php"); // контент страницы
        include_once("template/!tmp_footer.php"); // футер

?>
