<?php
ini_set("session.gc_maxlifetime",99999) ; // жизнь сессии
session_start();

class App {

	public function user($act) {

	    //Входные данные
        require_once 'Database.php';
        $db = new Database();

        $min = '3'; // количество минут между повторными регистрациями
        $id = $_POST['id'];
        $ip = $_SERVER["REMOTE_ADDR"];
        $act = $_REQUEST['act'];
		$name = $_POST['fname'];
		$login = $_POST['flogin'];
		$password = $_POST['fpassword'];
        $datatime = date("Y-m-d H:i:s");

        // Удаление
        if ( $act == "delete" ) {
            $db->deleteRow("DELETE FROM users WHERE id = ?", [$id]);
            $db->Disconnect(); // опустошаем объект БД
            $db->goWay('admin'); // уходим на страницу admin.php
        }

        // Регистрация
		if ( $act == "singin" ) {

		    // проверка на наличие такого же пользователя
            $userdata = $db->getRow("SELECT * FROM users WHERE login = ?", [$login]);
            if ( !empty($userdata) ) {
                $db->Disconnect();
                $db->goWay('singin','Такой пользователь уже есть, придумайте другой логин');
            }

            // защитник от частых регистраций
            //1 Получаем время крайней регистрации с IP адреса
            $antispam = $db->getRow("SELECT * FROM users WHERE ip LIKE ? ORDER BY `datatime` DESC ", [$ip]);

            //1.1 Если пользователя нет с таким IP
            if ( empty($antispam) ) {
                $db->insertRow("INSERT INTO users(username,login,password,ip,datatime) VALUE(?, ?, ?, ?, ?)", [$name,$login, $password, $ip,$datatime]);
                $db->Disconnect(); // опустошаем объект БД
                $db->goWay('login','Теперь вы можете авторизоваться'); // уходим на страницу login.php
            }

            //2 к времени из базы прибавляем время между регистрациями(блокировки)
            $date = new DateTime($antispam['datatime']);
            $date->add(new DateInterval('PT'.$min.'M'));
            $izbazi_plus = $date->format('Y-m-d H:i:s');
            $seichas = date("Y-m-d H:i:s");

            //3 сравниваем два время
            if ($seichas>=$izbazi_plus){
                $db->insertRow("INSERT INTO users(username,login,password,ip,datatime) VALUE(?, ?, ?, ?, ?)", [$name,$login, $password, $ip,$datatime]);
                $db->Disconnect(); // опустошаем объект БД
                $db->goWay('login','Теперь вы можете авторизоваться'); // уходим на страницу login.php
            }

            if ($seichas<$izbazi_plus){
                $db->goWay('singin','С Вашего IP частая регистрация попробуйте позже'); // уходим на страницу singin.php
            }

		}

		// Авторизация
		if ( $act == "login" ) {

		    // получаем данные о пользователе
		    $userdata = $db->getRow("SELECT * FROM users WHERE login = ? AND password = ?", [$login,$password]);

            // если нет информации по пользователю то уходим на стр. авторизации
            if ( empty($userdata) ) {
                $db->Disconnect();
                $db->goWay('login','Пользователь не найден');
            }

            // запись данных в сессию
            $_SESSION['login'] = $userdata['login'];
            $_SESSION['id'] = $userdata['id'];
            $_SESSION['name'] = $userdata['username'];

            // гасим подключение и уходим на страницу
            $db->Disconnect();
            $db->goWay('index');

		}

		// Выход
        if ( $act == "exit" ) {
            unset($_SESSION['password']);
            unset($_SESSION['login']);
            unset($_SESSION['id']);
            $db->goWay('index','Пока! '.$_SESSION['name']. ' возвращайся скорее');
        }

	}

}

App::user($act);

?>