<?php
    session_start(); //we need session for the log in thingy XD 

?>
<?php
 include("functions.php");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<html lang="en">


  <body>



    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
            <?php
            
                $query = "select * from `personne` where confirme='0' and role='laboratoire';";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                        ?>
                
                    <h1 class="jumbotron-heading"><?php echo $row['email'] ?></h1>
                       <?php  echo "<img style=\"  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 90%;\" src=../uploadanddisplayimage/images/".$row["fichier"].">\n"; ?>
                      <p>
                        <a href="accept-labo.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-2">Accepter</a>
                        <a href="reject-labo.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary my-2">Rejeter</a>
                      </p>
                
            <?php
                    }
                }else{
                    echo "Aucune demande en attente.";
                }
            ?>
          
        </div>
          
      </section>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
