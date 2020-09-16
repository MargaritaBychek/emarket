<?php
// Соединямся с БД
include ("db.php");
    $err = [];

    // проверям логин

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['username']))
    {
        $err[] = "username can consist only of letters of the English alphabet and numbers";
    }

    if(strlen($_POST['username']) < 3 or strlen($_POST['username']) > 30)
    {
        $err[] = "username must be at least 3 characters and no more than 30";
    }
    //Утюжим пришедшие данные
	if(empty($_POST['email']))
		$err[] = 'Поле Email не может быть пустым!';
	else
	{
		if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $_POST['email']))
           $err[] = 'Не правильно введен E-mail'."\n";
	}
	
	if(empty($_POST['password']))
		$err[] = 'Поле Пароль не может быть пустым';
	
	if(empty($_POST['password2']))
		$err[] = 'Поле Подтверждения пароля не может быть пустым';
    
    if($_POST['password'] != $_POST['password2'])
        $err[] = 'Пароли не совподают';
            
    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id_user FROM users WHERE username='".mysqli_real_escape_string($link, $_POST['username'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }
    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $username = $_POST['username'];
        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));
        $email=$_POST['email'];
        $result2 = mysqli_query ($link,"INSERT INTO user (username,password,email) VALUES('$username','$password1','$email')");
        if ($result2=='TRUE') {
            echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
        header("Location: ../login.php"); exit();   
    }
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
?>