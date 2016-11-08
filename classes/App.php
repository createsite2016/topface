<?php
ini_set("session.gc_maxlifetime",99999) ; // жизнь сессии
session_start();

/**
* Класс для работы с пользователями
*/
class App {

	public function user($act) {

	    //Входные данные
        require_once 'Database.php';
        $db = new Database();

        $id = $_POST['id'];
        $ip = $_POST['ip'];
        $act = $_REQUEST['act'];
		$name = $_POST['fname'];
		$login = $_POST['flogin'];
		$password = $_POST['fpassword'];

        // Удаление
        if ($act == "delete") {
            $db->deleteRow("DELETE FROM users WHERE id = ?", [$id]);
            $db->Disconnect(); // опустошаем объект БД
            $db->goWay('admin'); // уходим на страницу admin.php
        }

        // Регистрация
		if ($act == "singin") {

		    


            $db->insertRow("INSERT INTO users(username,login,password,ip) VALUE(?, ?, ?, ?)", [$name,$login, $password, $ip]);
            $db->Disconnect(); // опустошаем объект БД
            $db->goWay('login','Теперь вы можете авторизоваться'); // уходим на страницу login.php

		}

		// Авторизация
		if ($act == "login") {

		    // получаем данные о пользователе
		    $userdata = $db->getRow("SELECT * FROM users WHERE login = ? AND password = ?", [$login,$password]);

            // если нет информации по пользователю то уходим на стр. авторизации
            if (empty($userdata)) {
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
        if ($act == "exit") {
            unset($_SESSION['password']);
            unset($_SESSION['login']);
            unset($_SESSION['id']);
            $db->goWay('index','Пока! '.$_SESSION['name']. ' возвращайся скорее');
        }

	}

}

App::user($act);

?>