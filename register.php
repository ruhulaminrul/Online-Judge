<?php 
	include "header.php";
	if($isLoggedIn){
		$page=(isset($_GET['back']))?base64_decode($_GET['back']):"index.php";
		header("Location: $page");
	}
	else include "views/login/register.php";
	include "footer.php";

?>