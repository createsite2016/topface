<?php


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
        $act = $_POST['act'];
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
            $db->goWay('singin'); // уходим на страницу singin.php

		}

		// Авторизация
		if ($act == "login") {

		    $getuserdata = $db->getRow("SELECT * FROM users WHERE login = ? AND password = ?", [$login,$password]);
            if (empty($getuserdata)) { // если нет информации по пользователю то уходим на стр. авторизации
                $db->Disconnect();
                $db->goWay('login');
            }
            $db->Disconnect();
            $db->goWay('admin'); // если есть пользователь такой, то уходим к просмотру пользователей

		}

	}

}

App::user($act);

?>