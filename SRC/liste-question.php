<?php 
session_start();

$fichier="../ASSET/JSON/question.json";
$js=file_get_contents($fichier);
$json=json_decode($js,true);

if(isset($_POST['submit'])){

        if(!empty($_POST['nombre']) && $_POST['nombre']>=5 && $_POST['nombre']<=count($json)){

                $_SESSION['nombre']=$_POST['nombre'];

        


        }else{
                $_SESSION['nombre']=5;
        }
        
}


?>



<div class="bady">
            <div class="nombre"> 
            <form action="" method="post" id="myForm" onsubmit="return validateForm()">
                    <label for=""> <strong> Nbre de questions/jeu</strong></label>
                    <input type="number" min="0" id="point" name="nombre" value="<?php echo $_SESSION["nombre"]?>" style="width:60px;height:30px">
                    <input type="submit" id="ok" name="submit" value="ok" style="font-size:30px;color:white;background-color:blue;width:40px;height:40px">
             </form>
             <script>

 function validateForm(){
        

        var nombre=document.forms["myForm"]["nombre"].value;
        var nombre_regex=/[1-9]+/;
        var taille=<?php echo count($json)?>;

        if(nombre_regex.test(nombre) && ( nombre>=5 && nombre<=taille)){

                sessionStorage.setItem("myNombre",nombre);

                var nombre_session=sessionStorage.getItem("myNombre");
                var nombre_cookie=document.cookie=+nombre;+"path/;domaine=SRC\liste-question.php;expires max-age=31536000";
              

        }else{
        nombre_session=5;
         }

         if(nombre_cookie){
         nombre_cookie=nombre_session;
 }else{
         nombre_cookie=5;
     }



 }
 

          </script>
         
            </div><!-- fin div nombre-->

        <div class="liste-question">
    
               
                      <?php 
        

        $fichier="../ASSET/JSON/question.json";
        $js=file_get_contents($fichier);
        $json=json_decode($js,true);
        
   if(isset($_GET['page']) && (isset($_SESSION['nombre']))){

    $max=$_GET["page"]*5;
    $min=$max-5;
    
        for ($i=$min; $i < $max ; $i++) { 
                if(array_key_exists($i,$json)){
               $tab=array_values($json[$i]);
        
        
               if($tab[2]==" texte")
                  {
                          echo $tab[0]."<br>";
                          echo"<input type='text' readonly value='$tab[3]'><br>";
                  }
                                      
                                
                  if($tab[2]==" simple")
                  {
                          echo $tab[0]."<br>";
                          $position=1;
                          for ($j=3; $j <count($tab)-1; $j++) { 
                                  $tai=count($tab)-1;
                                  if($position==$tab[$tai]){
                                        echo"<input type='radio'  name='' disabled checked  value='$tab[$j]'>";  
                                        echo $tab[$j]."<br>" ;
                                        
                                  }else{
                                        echo"<input  type='radio'  name='' disabled   value='$tab[$j]'>";  
                                        echo $tab[$j]."<br>" ;
                                        
                                  }
                             
                             $position++;
                             
                          }
                          
                  }
                  if($tab[2]==" multiple")
                  {
                          echo $tab[0]."<br>";
                       
                          $position=1;
                          for ($j=3; $j < count($tab)-1; $j++) { 
                                $trouve=false;
                              $tabBonneReponse=$tab[count($tab)-1];
                                  foreach ($tabBonneReponse as $key) {
                                         if($key==$position){
                                                 $trouve=true;
                                         }
                                  }
                                  $position++;
                                  if($trouve==true){
                                        echo"<input type='checkbox' checked name=''  disabled   value='$tab[$j]'>";  
                                        echo $tab[$j]."<br>" ;  
                                  }else{
                                        echo"<input type='checkbox'  name=''  disabled   value='$tab[$j]'>";  
                                        echo $tab[$j]."<br>" ;
                                  }
                               

                          }
                          
                  }                 
                                
           }
        }

}

           

?>          


</div> <!-- fin question --><br><br>

  <div style="float:left;">      
<?php 

if ( isset($_GET['page']))
{
        if($_GET['page']>1)
        {
           $bouton=$_GET['page']-1;
           echo"<a href='menu.php?A=liste-question&page=$bouton'><button class='bouton' > Précédent</button> </a>"; 
           
       }else{}

}

?>

</div> <!-- fin div left-->


<div style="float:right;" >
<?php

if (isset($_GET['page'])){

        if($_GET['page']>=1 && $_GET['page'] < @count($tab))
        {
         $bouton=$_GET['page']+1;
         echo"<a href='menu.php?A=liste-question&page=$bouton'><button class='bouton'> Suivant</button> </a>";
         
        } else{}
 
}
?>
</div><!-- fin div right-->

          </div><!-- fin div bady-->

         