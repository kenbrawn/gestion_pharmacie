<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if (isset($_GET['id_fournisseur'])) {
    $id_fournisseur = $_GET['id_fournisseur'];

    // Vérifier si le formulaire de modification a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom_fournisseur = $_POST['nom_fournisseur'];
        $type_fournisseur= $_POST['type_fournisseur'];
        $date_creation= $_POST['date_creation'];
   

       $sql = "UPDATE fournisseur SET nom_fournisseur = '$nom_fournisseur', type_fournisseur = '$type_fournisseur', date_creation = '$date_creation' WHERE id_fournisseur = '$id_fournisseur'";

        if ($conn->query($sql) === TRUE) {
            echo "Les informations du fournisseur ont été mises à jour avec succès.";
            header("location:fournisseur.php");
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
    $sql = "SELECT * FROM fournisseur WHERE id_fournisseur = '$id_fournisseur'";
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
            <title>Modifier le fournisseur</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <style>
                body{
                       /* background: url("imagelogo.jpg");*/
                        background-repeat: no-repeat;
                        background-color:red;
		                background-size: cover;
                       /* width:1000px;
                        height:200px;*/
                }
                .form-container{
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        margin-top: 5px;
                    

                   }
                form {
                        background-color: #8f9b93;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(33, 9, 172, 0.3);
                        padding: 50px;
                        width: 300px;
                        margin-top: 15px;
                        margin-right:500px;
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
            
                </div>
                <form method="post" action="modifier.php?id_fournisseur=<?php echo $id_fournisseur; ?>">
                    <label for="nom_fournisseur">Nom du fournisseur:</label>
                    <input type="text" name="nom_fournisseur" value="<?php echo $row['nom_fournisseur']; ?>" required><br>
                    <label for="type_fournisseur">Type de fournisseur:</label>
                    <input type="text" name="type_fournisseur" value="<?php echo $row['type_fournisseur']; ?>" required><br>
                    <label for="date_creation">Date de creation</label>
                    <input type="date" step="0.01" name="date_creation" value="<?php echo $row['date_creation']; ?>" required><br>
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </body>

        </html>

    <?php
    } else {
        echo "Aucun client trouvé avec l'id: " . $id_fournisseur;
    }
} else {
    echo "La clé 'id' n'existe pas dans la requête GET.";
}

$conn->close();
?>
