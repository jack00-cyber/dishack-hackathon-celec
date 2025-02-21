<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'win');

if (!$conn) {
    die('Error: ' . mysqli_connect_error()); // Arrêter le script en cas d'erreur de connexion
}

if (isset($_POST['submit'])) {
    // Sécurisation des données
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $HOSPITAL = mysqli_real_escape_string($conn, $_POST['HOSPITAL']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $piece = intval($_POST['piece']); // Conversion en entier

    // Requête SQL correcte
    $sql = "INSERT INTO client (firstname, lastname, HOSPITAL, phone, address, email, piece) 
            VALUES ('$firstname', '$lastname', '$HOSPITAL', '$phone', '$address', '$email', $piece)";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>Commande enregistrée avec succès !</p>";
    } else {
        echo "<p style='color:red;'>Erreur : " . mysqli_error($conn) . "</p>";
    }
    
    // Fermer la connexion
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="POST">
    <br>
    <label>First name</label>
    <input type="text" name="firstname" id="firstname" placeholder="First name" required>
    <br>
    <label>Last name</label>
    <input type="text" name="lastname" id="lastname" placeholder="Last name" required>
    <br>
    <label>Hospital name</label>
    <input type="text" name="HOSPITAL" id="HOSPITAL" required>
    <br>
    <label>Phone number</label>
    <input type="text" name="phone" id="phone" placeholder="05........">
    <br>
    <label>Address</label>
    <input type="text" name="address" id="address" placeholder="Enter your address" required>
    <br>
    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="adel..@gmail.com" required>
    <br>
    <label>Piece</label>
    <input type="number" name="piece" id="piece" min="1" max="30" required>
    <br>
    <input type="submit" name="submit" value="ORDER" id="order">    
</form>

</body>
</html>
