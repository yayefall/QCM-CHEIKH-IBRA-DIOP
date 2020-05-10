<link rel="stylesheet" href="../ASSET/CSS/score.css">
<form action="" method="post">
<div class="design">
<div class="mark"> <h1>BIENVENUE SUR LE MONDE DE SCORE</h1></div>

<div class="cadre"> 
    <div class="commente"> 
<h2 style="color:green; text-align:center"> Vous avez terminé avec succés <br><br>Bravo mon champion!!</h2>;

    </div>
     <div></div><br><br><br>
<div class="score"> 

<?php
if($_SESSION['score']> $_SESSION['joueur']['score']){
    

$fichier="../ASSET/JSON/page.json";
$js=file_get_contents($fichier);
$json=json_decode($js,true);

$tableau=array();
$user=array();
 foreach($json as $key){

    if($key["login"]!=$_SESSION["joueur"]["login"]){
$tableau[]=$key;


    }else{

$user["prenom"]=$key["prenom"];
$user["nom"]=$key["nom"];
$user["login"]=$key["login"];
$user["password"]=$key["password"];
$user["confirmdp"]=$key["confirmdp"];
$user["role"]=$key["role"];
$user["avatar"]=$key["avatar"];
$user["score"]=$_SESSION["score"];
  
$tableau[]=$user;

    }

 }

 $tableau=json_encode($tableau);
 file_put_contents($fichier,$tableau);
$_SESSION["joueur"]["score"]=$_SESSION["score"];

    echo "<h1 class='texte'>vous avez battu votre score </h1> ";
}else{
    echo" <h1 class='texte'> Vous avez gagné un score de". " ".$_SESSION['score']."pts </h1>"; 
}


?>

</div>
</div><!-- fin cadre -->

    
    <div style="float:left">
       <input type="submit" name="rejouer" id="" class="bouton" value="Rejouer">
    
    </div>

</form>



<?php


if(isset($_POST['rejouer'])){
    header("location:interface-joueur.php?page=1");
    exit();
}


?>
