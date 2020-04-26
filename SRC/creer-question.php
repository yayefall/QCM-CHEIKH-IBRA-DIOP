

<style> span {color:red;font-size:10px; }</style>
     
     <div class="body"> 
            <div style="color:rgba(0, 128, 122, 0.774); text-align:center"><h1>PARAMETRER VOTRE QUESTION</h1></div>
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
                     <label for=""> <strong>Type de réponse</strong></label>
                     <select style="width:370px;height:40px" name="reponse" id="reponse">
                         <option> </option>
                         <option>Donner le type de réponse</option>
                         <option >Choix multiple avec une seule bonne réponse</option>  
                         <option > Choix multiple avec plusieurs réponses</option>  
                         <option >Réponse texte à saisir</option>   
                     </select>  <br><br>
                     <span id="reponse_error"></span> 
                    
                     <div id="inputs"> 
                         <div class="row" id="row">
                     <label for=""><strong> Nbre réponse </strong> </label>
                     <input type="text" name="repond"  id="repond" style= height:35px;width:280px >                   
                     <button style="position:absolute; padding:0px ;margin:5px 0 0 5px"  onclick="onAddInput()"><img src="../ASSET/IMG/ic-ajout-réponse.png" alt="" ></button><br>
                     <span id="repond_error"></span>
                          </div>
                     </div><br>

                     <!--<input type="checkbox" name="chekbox" id="chekbox" style="height:25px;width:25px">
                     <span id="chekbox"></span>
                     <input type="radio" name=" radio" id="radios"  style="height:25px;width:25px;">
                     <span id="ratios"></span>
                     <button class="supprime"><img style="width:20px,height:20px" src="../ASSET/IMG/ic-supprimer.png" alt=""></button>  -->
                     <input class="button" type="submit" value="Enrégistrer" name="valider" id="validation">

          </div><!-- fin div creer question-->
      </div><!-- fin div bady-->

      </form>

<script>




var question=document.getElementById('question');
var question_error=document.getElementById('question_error');
var regex_question=/^[A-Z][^.;!:]+[.!:?]$/;

var point=document.getElementById('point');
var point_error=document.getElementById('point_error');


var reponse =document.getElementById('reponse');
var reponse_error=document.getElementById('reponse_error');


var genere_error=document.getElementById('genere_error');

var repond=document.getElementById('repond');
var repond_error=document.getElementById('repond_error');
var regex_repond=/^[0-9]$/;

var validation= document.getElementById('validation');
validation.addEventListener('click',enregistrer);


function enregistrer(e){
if (question.value=="")
    {
       e.preventDefault();
       question.style.border=" solid 1px red";

    }else if(regex_question.test(question.value)==false)
      {
         e.preventDefault();
         question_error.innerHTML="Format incorrecte";

      }else{}


 if (point.value=="")
    {
       e.preventDefault();
       point.style.border=" solid 1px red";
    
    }else{}


 if(reponse.value=="")
        {
            e.preventDefault();
            reponse.style.border="solid 1px red";
        }else{}


if(repond.value=="")
   {
       e.preventDefault();
       repond.style.border="solid 1px red";

   }else if(regex_repond.test(repond.value)==false)
     {
       e.preventDefault();
       repond_error.innerHTML="Format incorrecte";
     }else{}



     function onAddInput()

    {
    var divInput=document.getElementById('inputs');
    var newInput=document.createElement('div');
    
    newInput.innerHTML='<input type="text" name="requette" id="" > <input type="checkbox" name="chekbox" id="" ><br> <input type="text" name=" radio" id="" ><input type="radio" name=" radio" id="" >';
    divInputs.appendChild(newInput);
    
    
    
    }



 








}












  </script>

  





































