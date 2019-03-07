<?php

try {
		$strconnexion = 'mysql:host=localhost;dbname=epargne';
		$pdo = new PDO ($strconnexion, 'root', '');
	}
	
catch (PDOException $e) {
	$msg = ' ERREUR PDO dans ' . $e->getmessage();
	die ($msg);
						}
?>
