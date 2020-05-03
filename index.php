
<?php
session_start();
 
 $fichier="./ASSET/JSON/page.json";
 $json=file_get_contents($fichier);
 $donnee=json_decode($json,true);
 
if (isset($_POST['bouton']))
{
    if(!empty($_POST['login']) && !empty($_POST['password']))
        {
 //recuperation des données-->
            $login=$_POST['login'];
            $password=$_POST['password'];
            
            foreach ($donnee as $value) 
            {
              if ($value["login"]==$login && $value ["password"]==$password)


                {
                 
                    
                    if($value['role']=='admin')

                    {
                      $_SESSION['admin']=$value;// enregistrement des donnees de l'admin dans une variable session pour la 
                            //page creation compte admin
                        header('location:./SRC/menu.php?A=liste-question&page=1');
                    }else 
                        
                    
                    {
                        $_SESSION['joueur']=$value;//enregistrement des donnees du joueur dans une variable session pour la 
                        //page liste joueur
                        header('location:./SRC/interface-joueur.php');
                    }

                }
    
            
            }
            
     echo " <p style='color:red'><strong>Cet utilisateur n'existe pas , veuillez vous inscrire.</strong></p>";
            



        }else
            {
                echo" <p style='color:red'><strong> Tous les champs sont obligatoirs.</strong></p>" ;
            }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGE DE CONNEXION</title>
    <link rel="stylesheet" href="./ASSET/CSS/page.css">
</head>
<body>

<div class="general">
    <div><img src="./ASSET/IMG/logo-QuizzSA.png" alt="" style="width: 70px; height: 90px;"> <div>
    <div style="color:white; margin-top:-130px; text-align:center; font-size:30px"><h1>Le plaisir de jouer</h1></div></div>
</div>  <!-- fin div general-->

<div class="partiel"><br><br><br><br><br>
        <div class="maket">
                <div class="login"><div><h2 style="color:white;font-size:20px">Login Form</h2></div>
                <div class="echap"> <img src="" alt=""></div></div><!-- fin div -->

                <form method="POST" action="">
                    <div class="leader" >
                            <div class="suite">

                                <div> <input type="text " name="login" placeholder=" Login"  class="text1"></div>
                                <div class="pass"><img src="./ASSET/IMG/ic-login.png" alt=""></div> 
                            </div><br><br><!-- fin suite-->

                            <div class="suite1">
                                <div class="pass1"><img src="./ASSET/IMG/ic-password.png" alt=""></div>
                                <div> <input type="password" name="password" placeholder="password" class="text2"></div>
                            </div><!-- fin suite1-->
                    </div><!--fin leader-->
                    <input type="submit" name="bouton" value=" CONNEXION"  class="bouton"> 
                    <a href="./SRC/creation-compte-user.php?page=joueur"  style="font-size:25px ; margin:30px;" >S'inscrire pour jouer</a>
                </form>
        </div><!-- fin div market-->

</div><!-- fin div partiel-->


</body>
</html>


