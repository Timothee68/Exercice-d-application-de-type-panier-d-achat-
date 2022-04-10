
<?php 
session_start();
include "header.php"   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ajout produit</title>
</head>
<body>
    <main>   
    <h2 class="title">Ajouter produit :</h1>
    <!-- un titre de page  -->
        <form action="traitement.php?action=ajouter"  method="post" class="form">
        <!-- action sert a atteindre le fichier.php qui récupère les infos du form || method sert a préciser quel méthode d'envoie va être utilisé post ne limite pas en taille de donner envoyable  -->
               <!-- ?action=ajouter pour dire qu'on passe par l'url pour faire l'action ajouter -->
                <p>
            <label class="label">
                Nom du produit :
                <input type="text" name="name" class="input">
                <!-- le nom du produit  -->
            </label>
                </p>
                <p>
            <label class="label">
                Prix du produit :
                <input type="number" step="any" name="price" class="input" >
                <!-- le prix du produit    step = ex: si on veut vendre un produit 2 par 2   -->
            </label>
                </p>
                <p>
            <label class="label">
               Quantité désirée :
                <input type="number" name="quantité" value="1" class="input">
            </label>
            <!-- champ d'envoie de la quantite de produit désirer -->
                </p>
                <p><input type="submit" name="submit" value="Ajouter le produit" class="submit"></p>
                <!-- <p><input type="submit" name="submit" value="Afficher produits"  class="submit"></p> -->
            <!-- boutton d'envoie du formulaire -->
<?php           
    echo empty($_SESSION['qtt']) ? "" : $_SESSION['qtt'];
    unset($_SESSION['qtt']); 
     
?>
  </form>   

<!-- Message d'erreur ou de succès lors de l'envoi du formulaire : -->
<?php
 //  if (empty($_SESSION['succes'])) {   // (si la session succes est vide)
//     echo " "; // (on echo rien du tout)
//     }
//  Else {     //(donc si la session succes n'est pas vide, si y'a un message ou n'importe quoi dedans)
 //     echo $_SESSION['succes']; 
// // (on affiche le message rentré dans session succes)
//     }                        
 //ou en ternaire ce qui signifie en if else le code ci dessus 
    echo empty($_SESSION['Erreur']) ? " " : $_SESSION['Erreur'];
// ? = if ou si c'est vrai  et  " " echo " "     et    : =  else
    unset($_SESSION['Erreur']);
                    
    echo empty($_SESSION['succes']) ? " " : $_SESSION['succes'];
    unset($_SESSION['succes']); 

    echo empty($_SESSION['qtt']) ? " " : $_SESSION['qtt'];
    unset($_SESSION['qtt']); 

?>
    <!-- fin du formulaire -->
    </main> 
      <?php
       
        
       include "footer.php";
       ?>
    </body>
    </html>
    <?php
    

    // include "traitement.php"; // dit a index recupere les infos de nanana.php
    // $_POST ---->> superglobale >>Un tableau associatif des valeurs passées au script courant via le protocole HTTP et la méthode POST lors de l'utilisation de la chaîne application/x-www-form-urlencoded ou multipart/form-data comme en-tête HTTP Content-Type dans la requête.
    // // $_SESSION ---->>>>> Superglobale Un tableau associatif des valeurs stockées dans les sessions, et accessible dans un contexte global (opposition au contexte local a l'interieur d'une fonction) 
?>   


