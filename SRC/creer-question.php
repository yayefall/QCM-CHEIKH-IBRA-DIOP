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
    <title>CREER DES QUESTIONS</title>
    <link rel="stylesheet" href="../ASSET/CSS/creer-question.css">
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
              </div><!-- fin login-->
              <div class="nene">
                        <div class="nono"><br> <br><div class="dada"><img src="<?php echo $_SESSION["admin"]["avatar"]  ?>" alt=""></div>
                         <div class="dodo"><?php echo $_SESSION['admin']['prenom']; ?> <br> <?php echo $_SESSION['admin']['nom']; ?> </div>
                        </div><br><!-- fin nene-->
                        <div class="nana">
                            <div style= > Liste des Questions</div>
                            <div class="nina"><a href="liste-question.php"><img src="../ASSET/IMG/ic-liste.png" alt=""></a> </div>
                        </div><br><br><!--fin nana -->
                        <div class="nana1">
                            <div style="height:60px; width:5px;flaot:left"></div>
                            <div class=" cree1"> Creer Admin</div>
                            <div class="nina1"> <a href="creer-admin.php"><img src="../ASSET/IMG/ic-ajout.png" alt=""></a></div></div><br><br><br><br><br>
                        <div class="nana2">
                            <div style= > Liste des joueurs</div>
                            <div class="nina2"><a href="liste-joueur.php"> <img src="../ASSET/IMG/ic-liste.png" alt=""></a> </div></div><br><br> <br>  

                        <div class="nana3">
                            <div style= > Creer des Questions</div>
                            <div class="nina3"> <a href="creer-question.php"> <img src="../ASSET/IMG/ic-ajout-active.png" alt=""></a></div></div><br>     
                        <div class="body"> 
                             <div style="color:rgba(0, 128, 122, 0.774); text-align:center"><h1>PARAMETRER VOTRE QUESTION</h1></div>
                             <div class="creer-question">
                             <form action="" method="POST">
                                <table>
                                <tr>
                                    <td>
                                    <strong>  Question</strong>  
                                    </td>
                                    <td>
                                    <textarea name="question" id="" cols="50" rows="4" style="border-radius:2px"></textarea>
                                    </td>
                                </tr><br><br>
                                <tr>
                                    <td>
                                    <strong> Nbre de points</strong>  
                                    </td>
                            
                                    <td>
                                    <select style="width:50px;height:30px" >
                                        
                                    </select>
                                    </td>
                                </tr><br><br>
                                <tr>
                                    <td>
                                    <strong>type de réponse</strong>  
                                    </td>
                            
                                    <td>
                                    <select style="width:250px;height:40px">
                                        <option  style=>donner le type de réponse</option>
                                    </select>
                                    <strong><a href="#" ><img src="../ASSET/IMG/ic-ajout.png" alt="" ></a></strong>
                                    </td>
                                    
                                </tr><br><br>
                                <td>
                                    <strong> Réponse 1 </strong>  
                                    </td>
                                    <td>
                                   <input type="text" name="repons" style= height:35px;width:245px >
                                   <input type="checkbox" name="" id="" style="height:30px;width:30px">
                                   <input type="radio"style="height:30px;width:30px;">
                                   <a href="#"><img src="../ASSET/IMG/ic-supprimer.png" alt=""></a>
                                    </td>
                                </tr><br>
                                <tr>

                                    <td>
                                        <input class="button" type="button" value="Enrégistrer" >
                                    </td>
                                </tr>


                                
                                </table>
                             </form>
                             </div><!-- fin div creer question-->
                        </div><!-- fin div bady-->
               </div><!-- fin div nene-->
         </div><!--fin div market-->
</div><!-- fin div partiel-->  

       


</body>
</html>