<?php
        require_once 'classes/Database.php';
        $db = new Database();
// Контент страницы
        $title = "Добро пожаловать!"; // Заголовок
// Название и пункты меню
        $en_menu = 'hide'; // для показа меню есть два свойства show или hide.
        $title_menu = " "; // заголовок меню
        $title_content_page = "Список пользователей";
        $content_page = "
             <center>
              <table class=\"mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp\">
                <thead>
                   <tr>
                      <th>Имя</th>
                      <th>Логин</th>
                      <th>IP</th>
                      <th></th>
                   </tr>
                </thead>
                <tbody>";

        $content_table = "";
        $getRows = $db->getRows("SELECT * FROM users");
                foreach ($getRows as $row) {
                    $content_table = $content_table .
                        "<tr><td>".$row['username']."</td>
                    <td>".$row['login']."</td>
                    <td>".$row['ip']."</td><td>
                    <form action='classes/App.php' method='POST'>
                    <input type='hidden' name='act' value='delete'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'>
                    Удалить
                    </button>
                    </form>
                    </td></tr>";
                }

        $db->Disconnect();
        $content_page = $content_page . $content_table . '</tbody></table></center>';

// Подключение шаблона
        include("template/!tmp_header.php"); // хэдер
        include("template/!tmp_menu.php"); // меню
        include("template/!tmp_content.php"); // контент страницы
        include("template/!tmp_footer.php"); // футер

?>