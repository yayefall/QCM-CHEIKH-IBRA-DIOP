
<?php

if(isset($_POST)){
    if(!empty($_POST['question']) && !empty($_POST['reponse']) && ($_POST['reponse']=="texte")&& !empty($_POST['point']) && !empty($_POST['requette2']))
    {

       
        $fichier="../ASSET/JSON/question.json";
        $js=file_get_contents($fichier);
        $json=json_decode($js,true);

        $question=$_POST['question'];
        $point=$_POST['point'];
        $reponse=$_POST['reponse'];
       $requette=$_POST['requette2'];
        
        $creer_question=[
            
                "question" => "$question",
                "point" =>  "$point",
                "reponse" =>  "$reponse",
                "ReponseBonne"=>"$requette",
        ];
       
        $json[]=$creer_question;
        $encode=json_encode($json);
        file_put_contents($fichier,$encode);
   
   
    }
    /**else
    {
     echo"<p style='color:red'><strong> Tous les champs sont obligatoirs.</strong></p>";
    }**/


       if(isset($_POST['reponse']) &&( $_POST['reponse']=="multiple")) 
        {

            $fichier="../ASSET/JSON/question.json";
            $js=file_get_contents($fichier);
            $json=json_decode($js,true);

            $question=$_POST['question'];
            $point=$_POST['point'];
            $reponse=$_POST['reponse'];
            $BonneReponse=$_POST["BonneReponse$i"];
        
            
            $creer_question=[
                
                    "question" => "$question",
                    "point" =>  "$point",
                    "reponse" =>  "$reponse",
                    "BonneReponse"=>"$BonneReponse"
                    
            ];

            
            for ($i=1; $i <= 10 ; $i++) { 
                if(isset( $_POST["requette_$i"] ))
                    {
                        $creer_question["rep$i"]= $_POST["requette_$i"];
                        
                    }
                
                    if(isset( $_POST["BonneReponse$i"] ))
                    {
                        $good["ok$i"]= $_POST["BonneReponse$i"];
                        
                    }

            }
            $creer_question["good"]=$good;
            $json[]=$creer_question;

            $encode=json_encode($json);
            file_put_contents($fichier,$encode);
           
        }
        
       if(isset($_POST['reponse']) && ($_POST['reponse']=="simple") )
       {
           $fichier="../ASSET/JSON/question.json";
           $js=file_get_contents($fichier);
           $json=json_decode($js,true);

           $question=$_POST['question'];
           $point=$_POST['point'];
           $reponse=$_POST['reponse'];
           $bonneReponse=$_POST['bonneReponse'];

           $creer_question=[
               
                   "question" => "$question",
                   "point" =>  "$point",
                   "reponse" =>  "$reponse",
                   
                   
           ];

           
           for ($i=1; $i <= 10 ; $i++) { 
               if(isset( $_POST["requette_$i"]))
                   {
                       $creer_question["rep$i"]= $_POST["requette_$i"];
                    
                   }
               

           }
           $creer_question["bonneReponse"]= $bonneReponse;
           $json[]=$creer_question;
           $encode=json_encode($json);
           file_put_contents($fichier,$encode);
          
       }


 } else if (isset($_POST['enregistrer']) && empty($_POST['question']) && empty($_POST['reponse']) && empty($_POST['point']))
  {
     
  echo"<p style='color:red'><strong> Tous les champs sont obligatoirs*!.</strong></p>";
 
 }

?>

<style> span {color:red;font-size:10px; }</style>
     
     <div class="body"> 
            <div style="color:rgba(0, 128, 122, 0.774); text-align:center"><h2>PARAMETRER VOTRE QUESTION</h2></div>
            <div class="creer-question">
                 <form action="" method="POST" ><br>
                     <label for=""><strong>Question </strong></label>
                 <textarea name="question" id="question" cols="60" rows="5" style="border-radius:2px"></textarea><br><br>
                     <span id="question_error"></span><br>
                     <label for=""> <strong> Nbre de points</strong> </label>
                     <select style="width:50px;height:30px" name="point"  id="point">
                         <option > </option>
                         <option > 1</option>
                         <option >1.5</option>
                         <option >2</option>
                         <option >3</option>
                         <option >3.5</option>
                    </select> <br><br>                               
                     <span id="point_error"></span>


                 <div class="row" id="row_0">
                     <label for=""> <strong>Type de réponse</strong></label>
                     <select style="width:300px;height:40px" name="reponse" id="reponse">
                         <option value=""></option>
                         <option>Donner le type de réponse</option>
                         <option   value="simple">Choix simple</option>  
                         <option  value="multiple" > Choix multiple</option>  
                         <option value="texte">Réponse texte </option>   
                     </select>  
                     <span id="reponse_error"></span> 
                     <button type="button"  id=" bouton" style="position:absolute; padding:0px ;margin:5px 0 0 5px"  onclick="onAddInput()" >
                     <img src="../ASSET/IMG/ic-ajout-réponse.png" alt="" ><br>
                </div>
                <div id="inputs" label="nobre_0"> 

            </div>
            <input class="button" type="submit" value="Enrégistrer" name="valider" id="validation">

          </div><!-- fin div creer question-->
      </div><!-- fin div bady-->
    
      </form>

<script>
    
var nbreLigne= 0 ;
function onAddInput()
{
    nbreLigne++;

    var divInput=document.getElementById('inputs');

    var newInput=document.createElement('div');

    newInput.setAttribute('class','row');

    newInput.setAttribute('id','row_'+nbreLigne);

    newInput.style.marginTop="5px";
 
 
  if(reponse.value=="multiple"){
    
    var tot=document.getElementById('inputs').childNodes.length;
    tot-=1;
   if(tot==0){
    tot=1;
    }else{
   tot++;
   }
  
    newInput.innerHTML=`<strong style="font-size: 22px;">Réponse ${nbreLigne} </strong>
   <input type="text" name="requette_`+tot+`" style=" height:35px;width:280px" >
   <input type="checkbox" name="BonneReponse`+tot+`" id="" value='`+tot+`'>
   <button type="button" onclick="onDeleteInput(${nbreLigne})" style=" padding:0px"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button> 

  `;

   divInput.appendChild(newInput);

    } else if(reponse.value=="simple"){
        
        var tot=document.getElementById('inputs').childNodes.length;
        tot-=1;
    if(tot==0){
        tot=1; 
    }else{
    tot++;
    }
    
    newInput.innerHTML=` <strong style="font-size: 22px;">Réponse ${nbreLigne} </strong>
    <input type="text" name="requette_`+tot+`" style=" height:35px;width:280px" >
    <input type="radio" name="bonneReponse" value='`+tot+`'id="" >
    <button type="button" onclick="onDeleteInput(${nbreLigne})" style=" padding:0px"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button> 

    `;
    
      divInput.appendChild(newInput);


     }else if(reponse.value=="texte") {
        
        //var bouton=document.getElementById("bouton");
        //bouton.disabled==true;

       newInput.innerHTML=` <strong style="font-size: 22px;">Réponse texte</strong>
       <input type="text" name="requette2" id="requette2" style=" height:40px;width:280px"  >
       <button type="button" onclick="onDeleteInput(${nbreLigne})" style=" padding:0px"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button> 
   
      `;

    divInput.appendChild(newInput);


      }else{}


}
 function onDeleteInput(n)
 {

    var target=document.getElementById('row_'+n);
    target.remove();
    

 }


var question=document.getElementById('question');
var question_error=document.getElementById('question_error');
var regex_question=/^[A-Z][^.;!:]+[.!:?]$/;

var point=document.getElementById('point');
var point_error=document.getElementById('point_error');


var reponse =document.getElementById('reponse');
var reponse_error=document.getElementById('reponse_error');

var validation= document.getElementById('validation');
validation.addEventListener('click',enregistrer);


function enregistrer(e){
if (question.value=="")
    {
       e.preventDefault();
       question.style.border=" solid 1px red";
       question_error.innerHTML="Ce champs est obligatoire*!";

    }else if(regex_question.test(question.value)==false)
      {
         e.preventDefault();
         question_error.innerHTML="Format incorrecte";

      }else{}


 if (point.value=="")
    {
       e.preventDefault();
       point.style.border=" solid 1px red";
       point_error.innerHTML="Ce champs est obligatoire*!";
    
    }else{}


 if(reponse.value=="")
        {
            e.preventDefault();
            reponse.style.border="solid 1px red";
            reponse_error.innerHTML="Ce champs est obligatoire*!";
        }else{}




}



  </script>

  





































