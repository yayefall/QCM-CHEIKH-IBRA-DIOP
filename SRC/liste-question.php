  
                
                <div class="bady"> 
                       <div class="nombre"> 
                                <label for=""> <strong> Nbre de questions/jeu</strong></label>
                                <input type="text" name="nombre" style="width:60px;height:30px">
                                <input type="button" value="ok" style="font-size:30px;color:white;background-color:blue;width:40px;height:40px">
                      </div><!-- fin div nombre-->
                      <div class="liste-question">
                      <?php 
        
        $fichier="../ASSET/JSON/question.json";
        $js=file_get_contents($fichier);
        $json=json_decode($js,true);
       

if(isset($_GET['page'])){

$max=$_GET['page']*5;
$min=$max-5;
        for ($i=$min; $i <$max ; $i++) { 
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
                          for ($j=3; $j < count($tab)-1; $j++) { 
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


</div> <!-- fin question --><br>
         
<?php 
if (isset($_GET['page']) ) {
        
        $bouton=$_GET['page']+1;
        echo"<a href='menu.php?A=liste-question&page=$bouton'><button class='bouton'> Suivant</button> </a>"; 
}

if(isset($_GET['page']) )
{
        
     $bouton=$_GET['page']-1;
     echo"<a href='menu.php?A=liste-question&page=$bouton'><button class='bouton'> precedent</button> </a>"; 
 }

 
 


?>
                </div><!-- fin div bady-->