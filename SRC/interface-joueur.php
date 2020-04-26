<?php
session_start();
if (empty($_SESSION['joueur'])) {
    header('location:../index.php');
    exit();//bloquer tout
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INTERFACE JOUEUR</title>
    <link rel="stylesheet" href="../ASSET/CSS/interface-joueur.css">
</head>
<body>
<div class="general">
    <div><img src="../ASSET/IMG/logo-QuizzSA.png" alt="" style="width: 70px; height: 90px;"> <div>
    <div style="color:white; margin-top:-130px; text-align:center; font-size:30px"><h1>Le plaisir de jouer</h1></div></div>
</div>  <!-- fin div general-->

<div class="partiel"><br>

    <div class="maket">
              <div class="login">
                     <div class="cadrefoto"> <div class="photo"><img src="<?php echo $_SESSION["joueur"]["avatar"]  ?>" alt=""></div>
                      <div class="nom"> <?php echo $_SESSION['joueur']['prenom']; ?>  <?php echo $_SESSION['joueur']['nom']; ?></div>
                     </div> <!-- fin cadrefoto-->
                    <div class="creer"><h2 style="color:white;font-size:20px" >BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h2></div>
                    <div class="echap"> <a href="deconnexion-joueur.php"><input type="submit" name="bouton" value="Deconnexion" 
                    style=" font-size: 20px; color:white;background:rgb(0, 128, 122, 0.349);"> </a></div>
              </div><!-- fin login--> <br>
              <div class="body">
                     <div class="cadre"><br>
                         <div class="tete_question">
                             <div class="point"></div>
                         </div><!-- fin tete question-->
                     </div><!-- fin cadre-->

                     <div class="score">
             <div class="top-score"> Top score<strong></strong></div>
             <div class="meilleur"><strong>Mon meilleur score</strong></div>
      <?php 

$fichier="../ASSET/JSON/joueur.json";
$js=file_get_contents($fichier);
$json=json_decode($js,true);

     
$tab=[];
foreach ($json as $value) 
{ 
   $tab[]=array
   (
       "nom"=>$value["nom"],
       "prenom"=>$value["prenom"],
       "score"=>$value["score"],

     );

}

$colonne=array_column($tab,"score");
array_multisort($colonne,SORT_DESC,$tab);
echo "<table>";
echo '<td><strong> Nom </strong></td><td><strong>Prenom </strong></td> <td><strong> Score</strong> </td>';
for ($i=0; $i <5; $i++) { 
  
    echo"<tr>";

    echo '<td>  <br>'.$tab[$i]["nom"].'</td>';
    echo '<td>  <br>'.$tab[$i]["prenom"].'</td>';
    echo '<td>   <br>'.$tab[$i]["score"].' pts</td>' ;



    echo"</tr>";

}

echo"</table>";
?>
                                  
                     </div><!-- fin score-->

              </div><!-- fin body  -->
    </div><!-- fin market-->

</div><!-- fin partiel-->






    </div> <!-- fin div maket-->
</div> <!-- fin div partiel-->
</body>
</html>