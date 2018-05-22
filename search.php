<?php 
include 'mysql.php';
function pre($thing) {
	echo "<pre>";
	print_r($thing);
	echo "</pre>";
} 

if (isset($_GET["search"])) {
	 $search = $_GET["search"];	
	 $requette = $bdd->prepare('SELECT * FROM product WHERE name = ?');
	 $requette->execute(array($search));

	 if ($requette->rowCount() == 0) {
	 	echo "Article introuvable";
	 }


 	while ($product = $requette->fetch()) {
		echo "<div>";
		echo "ID DU PRODUIT : " . $product['id'] . "<br>";
		echo "Nom du produit " . $product['name'] . "<br>";
		echo "Prix : " . $product['price'] . "€<br>";
		echo "Quantity : " . $product['quantity'] . "<br>";

		if ($product['is_active'] == 1) {
			echo "DISPONIBLE EN <span style='color:green;'>STOCK <br>";
		}

		echo '<img src="' . $product["photo"] . '" />' . "<br>";
		echo "</div>";
	}
 };

