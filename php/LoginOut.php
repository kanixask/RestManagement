<?php
	session_start();
    session_destroy();
	header('Location: ../html_pages/MainPage.php');
?>