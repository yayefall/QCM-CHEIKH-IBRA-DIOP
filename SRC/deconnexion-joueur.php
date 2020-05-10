
               
  <?php 
    
    
session_start();
unset($_SESSION['joueur'] );
unset($_SESSION["score"]);

header('location:../index.php');

        
?>
