<?php
session_start();

include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Récapitulatif des produits</title>
</head>
<body>
 
    <h1>Votre récapitulatif</h1>

    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])){
        // ! = soit la clé product n'existe pas || ou  la cle existe mais est vide  
        echo "<p>'Aucun produit dans votre panier...'</p>";
    }
    else {
        
        echo "<table border = 1" ,
                "<thead>",
                "<tr>",
                "<th>#</th>",
                "<th>Nom</th>",
                "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Somme</th>",
                        "<th colspan=2>Actions</th>",
                        "<th>Supprimé article</th>",
                        "</tr>",
                        "</thead>",
                        "<tbody>";
                        $totalGeneral =  0;
                        $totalProduit = 0;
                        // on créé la variable total général a 0 
                        foreach($_SESSION['products']  as $index => $product) {   
                           
                            
            // on parcour le tableau session pour afficher par la suite les produits sous forme de tableau 
            echo"<tr>",
                "<td> " .$index. "</td>",
                "<td> " .$product ['name'] . "</td>",
                " <td> " . number_format ( $product ['price'],2,","," &nbsp ") . "&nbsp;€</td>",
                // number_format(variable à modifier,nombre de décimales souhaité,caractère séparateur décimal, caractère séparateur de milliers5 );
                " <td> " . $product ['quantité'] . "</td>",
                " <td> ". number_format ( $product ['total'],2,","," &nbsp")."&nbsp;€</td>",
                "<td><a href ='traitementRecap.php?action=diminuer&index=$index'><i i class='fa-solid fa-minus'></i></a></td>",
                // on indique traitement.php comme référence || ? =(url)action=diminuer => on passe par l'url l'action est de diminuer || &id=$index => on prend l'id en reference pour pouvoir cibler le produit a ajouter 
                "<td><a href='traitementRecap.php?action=ajouter&index=$index'><i class='fa-solid fa-plus'></i></a></td>",
                "<td>Supprimer article<a href ='traitementRecap.php?action=delete&index=$index'><i class='fa-solid fa-trash'></i></a></td>",
         
            "</tr>";
            $totalGeneral += $product ['total'] ;
            $totalProduit += $product ['quantité'] ;
            $plurielTotalProduit = $totalProduit <= 1 ? "produit" : "produits";

            // pour chaque produit on rajoute la valeur a la variable total général !
        }
            echo "<tr>",
            "<td colspan=3>Total général :</td>",
            "<td><strong>".$totalProduit."</td> ", 
            "<td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
            "<td colspan=3>supprimer panier<a href='traitementRecap.php?action=delete-all'><i class='fa-solid fa-trash'></i></a></td>",
                "</tr>",
            "</tbody>",
            "</table>";
          
            echo "<p> Votre panier contient actuellement ".$totalProduit." ".$plurielTotalProduit."</p>";
           
}


?>

    <form class ="form2" action="index.php" >
     
        <p><input type="submit" name="submit" value="Retour séléction"></p>
    </form>
    <?php

include "footer.php";

?>
</body>
</html>