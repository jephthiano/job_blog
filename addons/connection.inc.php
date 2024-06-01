<?php
// connection function
function dbconnect($userType, $connectionType){
	if($userType === "admin"){// ALL GRANT PRIVILEDGES for admin connection only
		
		if(strstr(file_location('home_url',''),'000webhostapp')){
			#FOR 000WEBHOST
			$db = 'id17666514_blog_db';
			$username = 'id17666514_userallact';
			$password = 'L41V+c8fZ<na3o|)';
			$server = 'live';
		}else{
			#FOR LOCAL HOST
			$username = 'root';
			$password = 'jephthahJEHOVAHgod332$';
			$db = 'blog_db';
		}
		
		//CREATE DATABASE
		@$pre_conn = new mysqli('localhost',$username,$password);
		$sql = "CREATE DATABASE IF NOT EXISTS {$db}";
		@$pre_conn->query($sql);
	}else{// run this if no connection is specified
		exit('Error occurred while connecting to site');
	}
	// DEFINING CONNECTION TYPE
	if($connectionType === 'MYSQLI'){ // for mysqli object oriented
		define('HOST', 'localhost', true);
		define('DATABASE',$db, true);
		return new mysqli(HOST,$username,$password,DATABASE);
	}elseif($connectionType === 'PDO'){ // for pdo
		try{
			return new PDO ("mysql:host=localhost; dbname=$db; charset=utf8", $username, $password);
			// set the PDO error mode to excepption
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			echo 'connected successfully';
		}catch(PDOException $e){
			echo 'connection failed:'. $e->getMessage();
		}
	}
}
?>