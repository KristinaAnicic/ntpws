<?php
    unset($_POST);
	unset($_SESSION['user']);
    
    $_SESSION['user']['valid'] = 'false';
    
    header("Location: index.php?menu=1");
	exit;