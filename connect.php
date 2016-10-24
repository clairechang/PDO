<?php
	// 例外處理(Exception)
	try 
	{
		// connect
		$dsn = 'mysql:host=localhost;dbname=lovetravel;charset=utf8';
		$username = 'root';
		$password = '12345678';
	
		$db = new PDO ( $dsn, $username, $password);
		
	} 
	catch (Exception $e)
	{
		echo $e->getMessage();	
	}