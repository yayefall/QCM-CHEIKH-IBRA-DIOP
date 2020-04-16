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
    <title>CREATION DE COMPTE Admin</title>
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
                            <div class="nina"><a href="liste-question.php"> <img src="../ASSET/IMG/ic-liste.png" alt=""> </a></div></div><br><br>
                        <div class="nana1">
                            <div style="height:60px; width:5px;flaot:left"></div>
                            <div class=" cree1"> Creer Admin</div>
                            <div class="nina1"> <a href="creer-admin.php"><img src="../ASSET/IMG/ic-ajout-active.png" alt=""></a></div></div><br><br><br><br><br>
                        <div class="nana2">
                            <div style= > Liste des joueurs</div>
                            <div class="nina2"> <a href="liste-joueur.php"><img src="../ASSET/IMG/ic-liste.png" alt=""> </a></div></div><br><br> <br>  

                        <div class="nana3">
                            <div style= > Creer des Questions</div>
                            <div class="nina3"><a href="creer-question.php"> <img src="../ASSET/IMG/ic-ajout.png" alt=""></a> </div></div><br>     
               </div><!-- fin div nene-->
            <div class="doudou"> <br>
                <div style="font-size:20px"> 
                        <div><strong>S'INSCRIRE</strong> </div>
                        <div style=" font-size:10px ">pour propoger des Quizz </div><br>
                        <div style="width:350px; border:rgba(0, 0, 0, 0.400) solid 1px"> </div> 
                        <form method="POST" action="">
                                <label for=""> prenom</label><br>
                                <input type="text" name=" prenom"style="width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                <label for="">Nom</label><br>
                                <input type="text" name="nom"style="width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"> <br> 
                                <div class="profil"><div style ="margin-top:210px;"><strong>avatar Admin</strong></div></div><!-- fin profil-->
                                <label for="">Login</label><br>
                                <input type="text" name="login"style="width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                <label for=""> Password</label><br>
                                <input type="password" name="mdp" placeholder="****" style="width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                <label for="">confirmer password</label><br>
                                <input type="password" name="password" placeholder="****" style="width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                <input type="submit" name="fichier" value="Choisir un fichier" style=" background-color: rgba(0, 128, 122, 0.774);margin:10px 300px;color:white "><br>
                                <input type="submit" name="compte" value="Creer compte" style="margin:10px 200px; background-color: rgba(0, 128, 122, 0.774);color:white ">
                        </form>
                </div><!-- fin font-->

            </div><!-- fin div doudou-->

    </div> <!-- fin div maket-->
</div> <!-- fin div partiel-->


</body>
</html>