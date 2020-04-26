  
                
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

 var_dump($json);

if(isset($_POST['valider'])){
    
    if(!empty($_POST['question']) && !empty($_POST['reponse'])&& !empty($_POST['point']) && !empty($_POST['repond']))
    
    {



        $question=$_POST['question'];
        $reponse=$_POST['reponse'];
        $point=$_POST['point'];
        $repond=$_POST['repond'];
        
        
        $creer_question=[
            
                "question" => " $question",
                "point" =>  "$point",
                "reponse" =>  " $reponse",
                "repond" => "$repond"
                
        
        ];
        
         
        foreach($creer_question as $value)
         { 


        echo"  <br> Question:".$value['question'];
        echo"  <br> Point:".$value['point'];
        echo"  <br> Réponse:".$value['reponse'];
        echo"  <br> Répond:".$value['repond'];
       }

        $json[]=$creer_question;
       
        $encode=json_encode($json);
        file_put_contents($fichier,$encode);


    }else
       {
        echo"<p style='color:red'><strong> Tous les champs sont obligatoirs.</strong></p>";
       }
    } 

?>



                      </div> <!-- fin question --><br>
                              <input type="button" name=" button" value=" suivant"style="margin:10px 400px; background-color: rgba(0, 128, 122, 0.774);color:white ">
                              <div> </div>
                </div><!-- fin div bady-->