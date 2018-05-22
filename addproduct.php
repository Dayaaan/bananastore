<?php 
include 'mysql.php';

function clean_text($string) {
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

$error = '';
$name = '';
$price = '';
$photo = '';

if (isset($_POST["submit"])) {
	if (empty($_POST["name"])) {
		$error .= '<p class="text-danger">Veuillez entrer un nom<p>';
	}else {
		$name = clean_text($_POST["name"]);
		if(!preg_match("/^[a-zA-Z]*$/", $name)) {
			$error .= '<p  class="text-danger">Le nom n\'est pas conforme<p>';
		}
	}
	if (empty($_POST["price"])) {
		$error .= "<p  class='text-danger'>Veuillez rentrer que des chiffres</p>";
	}
	else {
		$price = $_POST["price"];
		if(!preg_match('#^[0-9]+$#', $_POST['price'])){
			$error .= "<p  class='text-danger'>Veuillez rentrer le nombre de point de vie en chiffre</p>";
		}
	}
	if (empty($_POST["quantity"])) {
		$error .= "<p  class='text-danger'>Veuillez rentrer que des chiffres</p>";
	}
	else {
		$quantity = $_POST["quantity"];
		if(!preg_match('#^[0-9]+$#', $_POST['quantity'])){
			$error .= "<p  class='text-danger'>Veuillez rentrer le nombre de point de vie en chiffre</p>";
		}
	}

	if (empty($_POST["photo"])) {
		$error .= "<p  class='text-danger'>Veuillez rentrer une URL valide</p>";
	}else {
		$photo = clean_text($_POST["photo"]);
		if(!preg_match("/^[a-zA-Z]*$/", $photo)) {
			$error .= "<p  class='text-danger'>L'\Url n'est pas valide<p>";
		}
	}


	$req = $bdd->prepare('INSERT INTO product(name, price, quantity, photo, is_active) VALUES(:name, :price, :quantity, :photo, 1)');

	$req->execute(array(

	    'name' => $name,

	    'price' => $price,

	    'quantity' => $quantity,

	    'photo' => $photo
	    ));

	$error = "<p  class='text-danger'>Vous avez crer votre héro avec succes</p>";
	$name = '';
	$hp = '';
	$armure;
	$avatar = '';

	header("Location:index.php");
	
};
