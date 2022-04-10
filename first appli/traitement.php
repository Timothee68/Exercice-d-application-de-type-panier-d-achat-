<?php
session_start();

if(isset($_POST['submit'])){ 
    $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_NO_ENCODE_QUOTES);
    $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $quantity = filter_input(INPUT_POST,"quantité",FILTER_VALIDATE_INT); // on valide un nombre integer.

    if ($name && $price && $quantity ){

        $product=[
            "name" => $name,
            "price" => $price,
            "quantité" => $quantity,
            "total" => $quantity*$price,
        ];
        $_SESSION ['products'][]= $product;
        
        // est une manière de stocker temporairement jusqu'au moment ou l'on supprime ou quitte la session

        $_SESSION['succes'] = "<p> Votre produit a bien été ajouté à votre panier </p>";
        // on déclare $_SESSION['succes'] puis le message a envoyé 
        } else {
        // sinon on déclare $_SESSION['erreur'] puis le message a envoyé 
        $_SESSION['Erreur'] = "<p> Veuillez renseigner la totalité des champs afin d'ajouter un produit 
        <br>
        Vous devez compléter les champs suivants : « Nom du produit, Prix du produit, Quantité désirée » </p>" ;
        }
    foreach($_SESSION['products']  as $index => $product) {   
    $totalProduit += $product ['quantité'] ;
    $plurielTotalProduit = $totalProduit <= 1 ? "produit" : "produits";
    $_SESSION['qtt'] = "<p> Votre panier contient actuellement ".$totalProduit." ".$plurielTotalProduit."</p>";
}
}

header("Location:index.php");
exit();
?>
<?php
// // session_start();
// // // Lorsque session_start() est appelée ou lorsqu'une session démarre une session toute seule, PHP va appeler les gestionnaires 
// //     d'ouverture et de lecture. Ce sont des gestionnaires internes fournis par PHP.
// //     au démarrage de la session , le serveur enregistrera un cookie PHPSESSID le cookie sera transmis au serveur a chaque requete HTTP effectuee par le client 
// // if(isset($_POST['submit'])){   
//     // on vérifie SI(quelque chose a été envoyé en POST)) 
//     $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     // ON Déclare une varible nommée en relation avec ce que l'on veut filtrer
//     // La fonction PHP filter_input() permet d'effectuer une validation ou un nettoyage de chaque donnée transmise par le formulaire en employant divers filtres
//     // ( INPUT_POST est le type de de varible que l'on veut filtrer ici $_POST,
//     // l'ID de ce que l'on veut vérifié ici "name de input "name" 
//     // PUIS FILTER.....CHARS qui permet de filtrer les caractere spéciaux ce qui empeche la faille XSS en introduisant du code  )         
//     $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
//     // FILTER_VALIDATE_FLOAT  Valide un nombre décimal, optionnellement dans l'intervalle fourni, et le convertit en nombre décimal en cas de succès. 
// //     // FILTER_FLAG_ALLOW_FRACTION Autorise un point (.) comme séparateur fractionnaire pour les nombres. ici un prix peut etre 9.99€
// //     $quantity = filter_input(INPUT_POST,"quantité",FILTER_VALIDATE_INT); // on valide un nombre integer.
// //     if ($name && $price && $quantity ){
// //         // on verifie comme ca si ses trois variables renverrons TRUE car les filtres renverrons false si les donnée envoye sont pas bonne    
// //         $product=[
// //             "name" => $name,
// //             "price" => $price,
// //             "quantité" => $quantity,
// //             "total" => $quantity*$price,
// //         ];
// //         // création du tableau qui va stockée les données en session !!! envoyer par l'utilisateur puis une 4ème key -> total pour simplifier le code par la suite et affiche le produit code plus explicite aussi     
// //         $_SESSION ['product'][]= $product;
// //     }
// // }

// // header("Location:index.php");//effectue une redirection grâce à la fonction header(). Cette fonction envoie un nouvel entête HTTP (les entêtes d'une réponse) au client. Avec le
// //                                 // type d'appel "Location:", cette réponse est envoyée au client avec le status code 302, qui
// //                                 // indique une redirection. Le client recevra alors la ressource précisée dans cette fonction.
// //                                 // de "else" à la condition puisque dans tous les cas (formulaire soumis ou non), nous
// //                                 // souhaitons revenir au formulaire après traitement.




