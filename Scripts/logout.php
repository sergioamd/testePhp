<?php
	session_destroy();
	unset($_SESSION['userNome'],
	$_SESSION['userCodigo']);
    header('location: /../pdv/index.php');
?>