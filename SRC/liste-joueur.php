<?php
session_start();
if (empty($_SESSION['admin'])) {
    header('location:../index.php');
    exit();//bloquer tout
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTE DES  JOUEURS</title>
    <link rel="stylesheet" href="../ASSET/CSS/liste-joueur.css">
</head>
<body>
    
<div class="general">
    <div><img src="../ASSET/IMG/logo-QuizzSA.png" alt="" style="width: 70px; height: 90px;"> <div>
    <div style="color:white; margin-top:-130px; text-align:center; font-size:30px"><h1>Le plaisir de jouer</h1></div></div>
</div>  <!-- fin div general-->

<div class="partiel"><br>
        <div class="maket">
              <div class="login">
                    <div class="creer"><h2 style="color:white;font-size:20px" >CREER ET PARAMETRER VOS QUIZZ</h2></div>
                    <div class="echap"><a href="deconnexion-admin.php"> <input type="submit" name="bouton" value="Deconnexion" 
                    style=" font-size: 20px; color:white;background:rgb(0, 128, 122, 0.349);"></a> </div>
              </div><!-- fin login-->
              <div class="nene">
                        <div class="nono"><br> <br><div class="dada"><img src="<?php echo $_SESSION["admin"]["avatar"]  ?>" alt=""></div>
                         <div class="dodo"><?php echo $_SESSION['admin']['prenom']; ?> <br> <?php echo $_SESSION['admin']['nom']; ?> </div>
                        </div><br><!-- fin nono-->
                        <div class="nana">
                            <div style= > Liste des Questions</div>
                            <div class="nina"> <a href="liste-question.php"><img src="../ASSET/IMG/ic-liste.png" alt=""></a> </div>
                        </div><br><br><!--fin nana -->
                        <div class="nana1">
                            <div style="height:60px; width:5px;flaot:left"></div>
                            <div class=" cree1"> Creer Admin</div>
                            <div class="nina1"> <a href="creer-admin.php"><img src="../ASSET/IMG/ic-ajout.png" alt=""></a></div></div><br><br><br><br><br>
                        <div class="nana2">
                            <div style= > Liste des joueurs</div>
                            <div class="nina2"><a href="liste-joueur.php"> <img src="../ASSET/IMG/ic-liste-active.png" alt=""></a> </div></div><br><br> <br>  

                        <div class="nana3">
                            <div style= > Creer des Questions</div>
                            <div class="nina3"> <a href="creer-question.php"> <img src="../ASSET/IMG/ic-ajout.png" alt=""></a></div></div><br>     
                       
               </div><!-- fin div nene-->
               <div class="body"> 
                   <h1 style="font-size: 40px; color:rgba(0, 0, 0, 0.400);text-align:center">Liste des joueurs par scores</h1><br>
                   <div class="liste-joueur"></div><br>
                   <input type="button" name=" button" value=" suivant"style="margin:10px 400px; background-color: rgba(0, 128, 122, 0.774);color:white ">

               </div><!-- fin div body-->
         </div><!--fin div market-->
</div><!-- fin div partiel-->  

       


</body>
</html>