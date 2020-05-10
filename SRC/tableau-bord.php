<?php
$fichier=("../ASSET/JSON/page.json");
$lamp=file_get_contents($fichier);
$lamp=json_decode($lamp,true);
$user=[];
$score=[];


$tab=[];
foreach ($lamp as $value) 
{ 
    if(isset($value["score"])){

   
   $tab[]=array
   (
       "nom"=>$value["nom"],
       "prenom"=>$value["prenom"],
       "score"=>$value["score"],

     );
    }
}
for($i=0;$i<count($tab);$i++){
$user[]=$tab[$i]["prenom"]." ".$tab[$i]["nom"];
$score[]=$tab[$i]["score"];

        
$colonne=array_column($tab,"score");
array_multisort($colonne,SORT_DESC,$tab);
}

$joueur=json_encode($user);
file_put_contents("../ASSET/JSON/tableau-bord.json",$joueur);
$point=json_encode($score);
file_put_contents("../ASSET/JSON/tableau-bord.json",$point);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau de bord</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    

<div class="body">

<canvas id="myChart"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?php echo $joueur;?>,
        datasets: [{
            label: 'PERFORMANCE DE MES JOUEURS',
            backgroundColor:[
            'rgba(255, 99, 135, 0.6)',
            'rgba(254, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(0, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.8)',
            'rgba(0, 128, 122, 0.774)',
            'rgba(205, 199, 132, 0.658)',
            'rgba(255, 190, 122, 0.774)',
            '#48d1ac'
          ],
            borderColor: 'rgb(255, 99, 132)',
            data: <?php echo $point;?>
        }]
    },

    // Configuration options go here
    options: {}
});
</script>

</div><!-- fin body-->



</body>
</html>