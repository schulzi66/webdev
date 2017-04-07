<?php
session_start();
include("../db/config.php");


if (!isset($_SESSION['username'])) {
	header('Location: ./login.php');
}

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['mypicture']) AND $_FILES['mypicture']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['mypicture']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['mypicture']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_authorized = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_authorized))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['mypicture']['tmp_name'], '../images/' . basename($_FILES['mypicture']['name']));
						
						$name= basename($_FILES['mypicture']['name']);
						
						$sql = "INSERT INTO images (name)
								VALUES ('$name')";
						$conn->query($sql);
						
						header("Location: ../admin.php");
						
                }
        }
}



?>