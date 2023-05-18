<?php  
session_start();
if(isset($_SESSION['user_id'])){
	header("localhost:login.php");
}
?>