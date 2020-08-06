<?php
	session_destroy();
	session_unset();
	header("Location: view_login.php");
?>