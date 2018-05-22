<!-- function getProductList() {
	$user = 'root';
	$password = '';

	$db = new PDO('mysql:host=localhost;dbname=bannanastore', $user, $password);

	$sql = "SELECT * FROM products";

	$statement = $db->query($sql, \PDO::FETCH_ASSOC);

	$products = [];

	foreach ($statement as $product)  {
		$products[] = $product;
	}

	return $products;
} -->

<?php 
try {
	$bdd = new PDO('mysql:host=localhost;dbname=bannastore;charset=utf8', 'root', 'troiswa', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$bdd->exec('SET NAMES UTF8');
}
catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
}
?>