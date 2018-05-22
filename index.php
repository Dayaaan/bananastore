<?php
include 'mysql.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<h1>List of product</h1>


	<form method="GET" action="search.php" class="form-group">
		<label for="search">Rechercher</label>
		<input type="search" name="search">
		<input type=submit>

	</form><br><br><br>

		<form method="POST" action="addproduct.php" class="form-group">
		<h2>Ajouter un produit</h2>
		<label for="search">name</label>
		<input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?> ">
		<br><br>
		<label for="price">prix</label>
		<input type="text" name="price">
		<br><br>
		<label for="quantity">Quantité</label>
		<input type="text" name="quantity">
		<br><br>
		<label for="photo">Photo</label>
		<input type="text" name="photo">
		<br><br>
		<input type="submit" name="submit">


	</form><br><br><br>



	<div class="div">
		<?php
			$reponse = $bdd->query('SELECT * FROM product');


			while ($product = $reponse->fetch()) {
				echo "<div>";
				echo "ID DU PRODUIT : " . $product['id'] . "<br>";
				echo "Nom du produit " . $product['name'] . "<br>";
				echo "Prix : " . $product['price'] . "€<br>";
				echo "Quantity : " . $product['quantity'] . "<br>";
				if ($product['is_active'] = 1) {
					echo "DISPONIBLE EN <span style='color:green;'>STOCK <br>";
				}
				echo '<img src="' . $product["photo"] . '" />' . "<br>";
				echo "</div>";
			}
			
			?>

	</div>


</body>
</html>