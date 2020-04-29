  
                
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
       // echo "<pre>";
        //print_r($json);
        //echo"</pre>";
               

                                 //echo' <input type="checkbox" name="chekbox" id="" >';
                                 //echo' <input type="radio" name="radio" id="" >

                   for ($i=0; $i <count($json) ; $i++) { 
                        $tab=array_values($json[$i]);
                        foreach ($tab as $value){
                                echo $value."<br>";
                      
                           if( isset($tab['reponse']) && $tab['reponse']=="multiple")
                               {
                                echo' <input type="checkbox" name="checkbox" id="" >';
                                
                               } else if( isset($tab['reponse']) && $tab['reponse']=="simple"){

                                echo' <input type="radio" name="radio" id="" >';
                               }
                   

                        }     
                   }



                   

          
               
               

?>
                      </div> <!-- fin question --><br>
                              <input type="button" name=" button" value=" suivant"style="margin:10px 400px; background-color: rgba(0, 128, 122, 0.774);color:white ">
                              <div> </div>
                </div><!-- fin div bady-->