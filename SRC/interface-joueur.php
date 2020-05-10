
<?php
session_start(); 
if(!isset($_SESSION["score"])){
    $_SESSION["score"]=0;
}
 
if (empty($_SESSION['joueur'])) {
   header('location:../index.php');
    exit();//bloquer tout

}

if($_GET['page']>$_SESSION['nombre']){
    require_once("score.php");
    exit();
    
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

              <div style="float:right"><a href="interface-joueur.php?page=6"><input type="submit" name="quitter" id="" class="bouton" value="Quitter"></a></div>
                     <div class="cadre"><br>
                     
<form action="" method="post"> 
   
                 <div class="tete_question">
                 <div class="affiche_question"><strong>Question <?php echo  $_GET['page']. "/".$_SESSION['nombre'];?></strong></div>
                             
                             <?php

                       
             $fichier="../ASSET/JSON/question.json";
             $js=file_get_contents($fichier);
             $json=json_decode($js,true);
                        
if(isset($_GET['page'])){
   
    $max=$_GET['page']*1;

    $min=$max-1;

    
        for ($i=$min; $i < $max ; $i++) { 

            if($i<$_SESSION['nombre']){ 

                if(array_key_exists($i,$json)){

                    $tab=array_values($json[$i]);
             
                    if($tab[2]==" texte")
                     {
                                
                                echo "<div class='jeux_question'><strong>$tab[0]</strong></div>";
                                if($tab[1]==1){
                                    echo "<div class='jeux_point'><strong>$tab[1]pt</strong></div>";
                                }else{
                                    echo "<div class='jeux_point'><strong>$tab[1]pts</strong></div>";
                                }
                                   
                                    echo "<strong><div class='jeux_reponse'><input type='text'  class='inputs' name='texte' ></div></strong>";     
                                   
                       }

                       if($tab[2]==" simple")
                       {
                         echo "<div class='jeux_question'><strong>$tab[0]</strong></div>";
                         if($tab[1]==1){
                            echo "<div class='jeux_point'><strong>$tab[1]pt</strong></div>";
                         }else{
                            echo "<div class='jeux_point'><strong>$tab[1]pts</strong></div>";
                         }
                         
                               $position=1;
                               for ($j=3; $j <count($tab)-1; $j++) { 
                                       $tai=count($tab)-1;
                
                                  echo"<strong><div class='jeux_reponse'><input type='radio'  class='inpute' name='bon'   value='$position'>$tab[$j]</div></strong>";  
                                   $position++;          
                               }
                             
                       }
                     if($tab[2]==" multiple")
                        {
                           echo "<div class='jeux_question'><strong>$tab[0]</strong></div>";
                           if($tab[1]==1){
                            echo "<div class='jeux_point'><strong>$tab[1]pt</strong></div>";
                           }else{
                            echo "<div class='jeux_point'><strong>$tab[1]pts</strong></div>";
                           }
                               $position=1;
                               for ($j=3; $j < count($tab)-1; $j++) { 
                                   $tabBonneReponse=$tab[count($tab)-1];
                                  
                                         echo"<strong><div class='jeux_reponse'><input type='checkbox'class='inpute'  value='$position'name='rep$position'>$tab[$j]</div></strong>";  
                                         $position++;                                    
                                }

                    
                       }
                
                } else{}

            }
          

   
   
        }

}


                    ?>
                    


                  </div><!-- fin tete question-->
                 
                  
<div class="page">

       <div style="float:left;">   
<?php 

if (isset($_GET['page']))
{
        if($_GET['page']>1)
        
        {
           $bouton=$_GET['page']-1;
           echo"<input type='submit' class='bouton'name='precedent' value='Précédent'>"; 
           
       }else{}

}

?>

</div> <!-- fin div left-->


<div style="float:right;" >
<?php

if (isset($_GET['page'])){

        if($_GET['page']>=1 && $_GET['page'] < $_SESSION['nombre'])
        {
        $bouton=$_GET['page']+1;
            echo"<input type='submit' class='bouton'name='ok' value='Suivant'>"; 
         
        } else if( $_GET['page']=$_SESSION['nombre'])
            {
            
             $bouton=$_GET['page'];
            echo"<input type='submit' class='bouton'name='ok' value='Terminer'>"; 
        }else{}
 
}

?>

</div><!-- fin div right-->

</div><!-- fin div div page-->

</form>

<?php 
  if(isset($_POST["ok"])){
       
      if($tab[2]==" simple"){
          if($_POST["bon"]==$tab[count($tab)-1]){
               $_SESSION["score"]=$_SESSION["score"]+$tab[1];
              
            }
           /*$bonnereponse=$_POST['bon'];
          if($tab[3]==$bonnereponse){
            
            echo $bonnereponse;
            var_dump($_POST['bon']);
          }*/
       }
   
   
 if($tab[2]==" texte"){
      if($_POST["texte"]==$tab[3]){
           $_SESSION["score"]=$_SESSION["score"]+$tab[1];

       }
       $_SESSION['juste']=$_POST['texte'];
       if($tab[3]=="ReponseBonne"){
            
        $_SESSION['juste'] =$tab[3];
        var_dump($_SESSION['juste']);
      }
    }

if($tab[2]==" multiple"){
    $cochet=array_intersect($_POST,$tab[count($tab)-1]);
    print_r($cochet);
    if(count($cochet)==count($tab[count($tab)-1])){

        $_SESSION["score"]=$_SESSION["score"]+$tab[1];
    }
    

    

}

$bouton=$_GET['page']+1;
   
header("location:interface-joueur.php?page=$bouton");
 }
    
if(!empty($_POST["precedent"])){
    $bouton=$_GET['page']-1;
   
   header("location:interface-joueur.php?page=$bouton");
}


    ?>
                     </div><!-- fin cadre-->

<div class="scores">
<div class="meilleur"><strong>Mon meilleur score</strong></div>
<?php echo $_SESSION["joueur"]["score"]."pts"; ?>

</div><!--fin scores -->

  <div class="score">
                         
     <div class="top-score"> Top score<strong></strong></div>
             
      <?php 

$fichier="../ASSET/JSON/page.json";
$js=file_get_contents($fichier);
$json=json_decode($js,true);

     
$tab=[];
foreach ($json as $value) 
{ 
    if(isset($value['score'])){

   
   $tab[]=array
   (
       "nom"=>$value["nom"],
       "prenom"=>$value["prenom"],
       "score"=>$value["score"],

     );
    }
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
    <div class="footer">
    <div style="color:white;font-size:40px">Yaye Fall Developpeuse Sonatel Accademy 2020</div>
    <div><img src="../ASSET/IMG/logo-SA.png" alt="" style="width: 50px; height: 60px; float:right;margin-top:-40px"> <div>
</div><!-- fin partiel-->

</div>
</body>
</html>