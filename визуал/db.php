<!DOCTYPE html>

<html lang="ru">

<head>

<title><?php echo $title; ?></title>

<link rel="stylesheet" href="styledb.css">



<meta content="text/html; charset=utf-8">

</head>
<?php

// Подключаем библиотеку RedBeanPHP

require "rb.php";

// Подключаемся к БД

R::setup( 'mysql:host=localhost; dbname=служба доставки грузов 2',

'root', '' );

// Проверка подключения к БД

 if(!R::testConnection()) die('No DB connection!');

session_start(); // Создаем сессию для авторизации

?>
