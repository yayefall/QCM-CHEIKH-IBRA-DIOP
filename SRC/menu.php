
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
    <title>MENU DU JEU</title>
    <link rel="stylesheet" href="../ASSET/CSS/menu.css">
    <link rel="stylesheet" href="../ASSET/CSS/liste-Question.css">
    <link rel="stylesheet" href="../ASSET/CSS/creer-question.css">
    <link rel="stylesheet" href="../ASSET/CSS/liste-joueur.css">
    <link rel="stylesheet" href="../ASSET/CSS/compte-admin.css">
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
                    <div class="echap"> <a href="deconnexion-admin.php"><input type="submit" name="bouton" value="Deconnexion" 
                    style=" font-size: 20px; color:white;background:rgb(0, 128, 122, 0.349);"> </a></div>
              </div> <!-- fin login-->
               <div class="nene">
                        <div class="nono"><br> <br><div class="dada"> <img src="<?php echo $_SESSION["admin"]["avatar"]  ?>" alt=""></div>
                        <div class="dodo">  <?php echo $_SESSION['admin']['prenom']; ?> <br> <?php echo $_SESSION['admin']['nom']; ?></div>
                    </div><br><!-- fin nono-->
                        <div class="nana">
                            <div style= > Liste des Questions</div>
                            <div class="nina"><a href="menu.php?A=liste-question&page=1"> <img src="../ASSET/IMG/ic-liste.png" alt=""> </a></div></div><br><br>
                        <div class="nana1">
                            <div style="height:60px; width:5px;flaot:left"></div>
                            <div class=" cree1"> Creer Admin</div>
                            <div class="nina1"><a href="menu.php?A=creer-admin&page=admin"><img src="../ASSET/IMG/ic-ajout.png" alt=""></a></div></div><br><br><br><br><br>
                        <div class="nana2">
                            <div style= > Liste des joueurs</div>
                            <div class="nina2"> <a href="menu.php?A=liste-joueur&page=1"><img src="../ASSET/IMG/ic-liste.png" alt=""> </a></div></div><br><br> <br>  

                        <div class="nana3">
                            <div style= > Creer des Questions</div>
                            <div class="nina3"><a href="menu.php?A=creer-question"> <img src="../ASSET/IMG/ic-ajout.png" alt=""></a> </div></div><br>     
               </div><!-- fin div nene-->
            <div class="menu"> <br>
             <?php  if(isset($_GET['A'])) {

                 if($_GET['A']=="creer-admin"){
                    require_once("creer-admin.php");
                 }


                 if($_GET['A']=="liste-question"){
                    require_once("liste-question.php");
                 }

                 
                 if($_GET['A']=="creer-question"){
                    require_once("creer-question.php");
                 }



                 if($_GET['A']=="liste-joueur"){
                    require_once("liste-joueur.php");
                 }


             }

             ?>
            </div><!-- fin div menu-->

    </div> <!-- fin div maket-->
</div> <!-- fin div partiel-->


</body>
</html>