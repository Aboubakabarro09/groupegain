<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

try {
	$pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
	$pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
} catch (PDOEXception $e) {	
	die(print_r("erreur bdd:".$e -> getMessage()));
}

if (isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
	$rec = $pdo->prepare('SELECT * FROM taches WHERE id=?');
	$rec ->execute(array($getid));
	if ($rec -> rowCount() > 0) {
		$deletePost = $pdo->prepare('DELETE FROM taches WHERE id=?');
		$deletePost ->execute(array($getid));
		header('location: index.php');
	}else{
		echo "Aucun article n'a été trouvé!";
		}
}else{
	echo "Aucun identifiant trouvé!";
}
?>