<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if (isset($_GET['id_client'])) {
    $id_client = $_GET['id_client'];

    // Vérifier si le formulaire de modification a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom_client = $_POST['nom_client'];
        $adresse_client = $_POST['adresse_client'];
        $telephone = $_POST['telephone'];
   

       $sql = "UPDATE client SET nom_client = '$nom_client', adresse_client = '$adresse_client', telephone = '$telephone' WHERE id_client = '$id_client'";

        if ($conn->query($sql) === TRUE) {
            echo "Les informations du client ont été mises à jour avec succès.";
            header("location:client.php");
        } else {
            echo "Erreur lors de la mise à jour des informations du client : " . $conn->error;
        }
    }
    $conn->close();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacie";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Récupérer les informations du médicament à modifier
    $sql = "SELECT * FROM client WHERE id_client = '$id_client'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier le client</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <style>
                .form-container{
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        margin-top: 5px;
                      /*  background: url("client.jpg");*/

                   }
                form {
                        background-color: #8f9b93;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(33, 9, 172, 0.3);
                        padding: 50px;
                        width: 300px;
                   }  
                   input[type="text"],
                   input[type="number"],
                   input[type="date"] 
                  {
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 3px;
                        margin-bottom: 15px;
                    }
                    input[type="submit"] {
                        background-color: #4CAF50;
                        color: #fff;
                        border: none;
                        padding: 10px;
                        border-radius: 3px;
                        cursor: pointer;
                    }
                    .container {
                    display: flex;
                    align-items: right;
                    }

                   .image-container {
                        flex:2;
                        max-width: 30%;
                        width:50px;
                        
                    }

                   .form-container {
                       flex: 1;
                       padding-right:50px; /* Espacement entre l'image et le formulaire */
                       margin: 5px;
                     }
            </style>
        </head>

        <body>
            <div class="form-container">
                <div class="image-container">
                    <img src="client.jpg"  alt="Image">
                </div>
                <form method="post" action="modifier.php?id_client=<?php echo $id_client; ?>">
                    <label for="nom_client">Nom du client:</label>
                    <input type="text" name="nom_client" value="<?php echo $row['nom_client']; ?>" required><br>
                    <label for="adresse_client">Adresse client:</label>
                    <input type="text" name="adresse_client" value="<?php echo $row['adresse_client']; ?>" required><br>
                    <label for="telephone">Telephone:</label>
                    <input type="number" step="0.01" name="telephone" value="<?php echo $row['telephone']; ?>" required><br>
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </body>

        </html>

    <?php
    } else {
        echo "Aucun client trouvé avec l'id: " . $id_client;
    }
} else {
    echo "La clé 'id' n'existe pas dans la requête GET.";
}

$conn->close();
?>
