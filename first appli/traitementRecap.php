<?php
session_start();
//si dans l'url 'action' 
if(isset($_GET['action'])){
    //on switch 
    switch($_GET['action']){
        //si $_GET['actiopn']== a 'add' 
        case "add":
            

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
               
          }
        }
        break;
        case "ajouter":
                if (isset($_GET['index'])){
                $id=$_GET['index'];
                    if(isset($_SESSION['products'][$id])){
                    $_SESSION['products'][$id]['quantité']++ ;
                    $_SESSION['products'][$id]['total']+= $_SESSION['products'][$id]['price'];
                }
            }
        break;
        case "diminuer":
            if (isset($_GET['index'])){
            $id=$_GET['index'];
                if(isset($_SESSION['products'][$id])){
                    $_SESSION['products'][$id]['quantité']--;
                    $_SESSION['products'][$id]['total']-=$_SESSION['products'][$id]['price'];
            }
        }
    break;
                //   SI j'ai dans l'url un index 
                //  je recupere l'index dans l'URL 
                // si on a un produit qui correspond a l'index on supprime le porduit en fonction de son index  
            case "delete":
               if (isset($_GET['index'])){ // si (il existe(dans mon url 'index' ( crée dans mon tableau 'traitement.php?action=delete& || ici---> index ||=$index')))
                   $id=$_GET['index']; // je crée une nouvelle variable qui prendra pour valeur l'index dans l'url  
                   if(isset($_SESSION['products'][$id])){ // si l'index existe (dans ma session produit)(mon index recuperer dans l'url))
                    unset($_SESSION['products'][$id]); // supprimer dans ma session produit par l'id mon porduit 
                   }
               }
                
            
                break;

            case "delete-all": 
                if(isset($_SESSION['products'])){
                    unset($_SESSION['products']);
                }else{
                    echo "Le panier est déjà vide";
                }
            break;
       
    }
}

header("Location:recap.php");
exit();
?>