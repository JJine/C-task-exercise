<?php

	define("__ROOT", dirname(__DIR__));
	define("__SRC", __ROOT . "/src");


	include_once __ROOT . "/autoload.php";
	include_once __ROOT . "/web.php";

	Jine\App\Router::route();