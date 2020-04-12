<?php   

$_SESSION['email']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
   
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        /*
** Style Simple Ecommerce Theme for Bootstrap 4
** Created by T-PHP https://t-php.fr/43-theme-ecommerce-bootstrap-4.html
*/
.bloc_left_price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 150%;
}
.category_block li:hover {
    background-color: #007bff;
}
.category_block li:hover a {
    color: #ffffff;
}
.category_block li a {
    color: #343a40;
}
.add_to_cart_block .price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 200%;
    margin-bottom: 0;
}
.add_to_cart_block .price_discounted {
    color: #343a40;
    text-align: center;
    text-decoration: line-through;
    font-size: 140%;
}
.product_rassurance {
    padding: 10px;
    margin-top: 15px;
    background: #ffffff;
    border: 1px solid #6c757d;
    color: #6c757d;
}
.product_rassurance .list-inline {
    margin-bottom: 0;
    text-transform: uppercase;
    text-align: center;
}
.product_rassurance .list-inline li:hover {
    color: #343a40;
}
.reviews_product .fa-star {
    color: gold;
}
.pagination {
    margin-top: 20px;
}

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Mes produits</h1>
     
    </div>
</section>
 <?php
$connexion = mysqli_connect("localhost", "root", "","tsante2");
mysqli_set_charset($connexion,"utf8");
    if (mysqli_connect_errno())
      {
  die("Erreur de connexion".mysqli_connect_error());
      }
    else {
      
    }

$result = mysqli_query($connexion," SELECT * FROM produit WHERE id_opt='{$_SESSION['id']}'"); 
if($result){ $nbpharma=mysqli_num_rows($result);

  if($nbpharma >0){  
    echo '<div class="container">';  
   echo '<div class="row">';
     echo'<div class="col">';
            echo '<div class="row">';
  echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nbpharma>0 && $pharma=mysqli_fetch_array($result)) {?>
   <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
      <?php  echo "  <td>\n"; ?>

              
                     <?php   echo "<img class=\"card-img-top\"src=img/".$pharma["img"].">\n";?>
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product"><?php echo $pharma["nom"]; ?></a></h4>
                            
                              <h5 class="card-title"><?php echo $pharma["couleur"]; ?></h5>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo$pharma["prix"]; ?></p>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div></div></div>
               <?php echo "</td>\n";?>
        <?php $nbpharma--;
$k=$k+1;
if($k==3){
    $k=0;
echo "</tr>\n";
echo "<tr>\n";
}
}echo "</tr>\n";
echo "</table>\n";
echo " </div>";echo " </div>";
echo " </div>";echo " </div>";}
else{
    echo "<p>Désolé, il n'y a pas de réponce correspondant à votre recherche ";
         }
}else {
   echo "erreur dans la requete";  
   echo "le message d'erreur est : " .mysqli_error($connexion);
}
?>

     
   



<script type="text/javascript">

</script>
<?php include('includes/scripts.php');

?>