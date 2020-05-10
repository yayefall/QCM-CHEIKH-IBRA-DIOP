         <div class="body">
               
                   <h1 style="font-size: 40px; color:rgba(0, 0, 0, 0.400);text-align:center">Liste des joueurs par scores</h1><br>
                   <div class="liste-joueur">
                       
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

$Nbre_joueur_par_page=3;// nombre de joueur par page
$Nbre_total_joueur=count($tab); //nombre total de joueur
// on calcule le nombre total de page et la fonction ceil arrondti le nombre par l'entier supérieur
$Nbre_de_page=ceil($Nbre_total_joueur/$Nbre_joueur_par_page);
 
if(isset($_GET['page']) && is_numeric($_GET['page']))
  {//on vérifie léexistance de la page et si la valeur de la page est un nombre

      $Num_de_page=$_GET['page'];// on rcupere les donnees de $_get [page]

  }else
    {
        $Num_de_page=1; //le num de la 1ere page = 1
    }
     if($Num_de_page < 1) //si le num de la 1ere page < 1 on revient toujours sur la 1ere page
      {
        $Num_de_page = 1;
    // si le num de page > nbre de page on revient tjours sur le nbre de page cad le num de la derniere page
      }else if($Num_de_page > $Nbre_de_page)
        {
           $Num_de_page= $Nbre_de_page;
        } 

 if(isset($_GET['page'])) {

    echo "<table>";
    echo '<td><strong> Nom </strong></td><td><strong>Prenom </strong></td> <td><strong> Score</strong> </td>';
    $max=$_GET['page']*4;//numero de page
    $min=$max-4;
    for ($i=$min; $i <$max; $i++) { 
            echo"<tr>";
            if (array_key_exists($i,$tab)) {
            
        
            echo "<td> <br>".$tab[$i]["nom"]."</td>";
            echo "<td> <br>".$tab[$i]["prenom"]."</td>";
            echo "<td> <br>".$tab[$i]["score"]."pts</td>";

        }
            
            echo"</tr>";

    }
    echo"</table>";
}

  ?>

    </div><!-- fin div body-->
                 
                 
    <div  style="float:left;">  
                   
<?php  
if(isset($_GET['page'])) {

  if($_GET['page'] > 1){

    $boutons=$_GET['page']-1;
    echo"<a href='menu.php?A=liste-joueur&page=$boutons'><button class='bouton'> Precedent</button> </a>"; 
  }else{}
   
}


?>

</div><!-- fin div left-->
<div style="float:right;">

<?php

if(isset($_GET['page'])) {
     if($_GET['page']>=1 && $_GET['page'] < @$Nbre_de_page){
      $bouton=$_GET['page']+1;
      echo"<a href='menu.php?A=liste-joueur&page=$bouton'><button class='bouton'> Suivant</button> </a>"; 
   }else{}
  

  }
   
?>
</div><!-- fin div right-->
                
               </div><!-- fin div body-->