<?php
session_start();


$fichier="../ASSET/JSON/page.json";
$js=file_get_contents($fichier);
$json=json_decode($js,true);



if (isset($_POST['compte'])) 
{ 
        if (!empty($_POST['prenom'])&& !empty($_POST['nom']) &&!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['mdp']) && !empty($_FILES['image']))
        {
                $prenom=$_POST['prenom'];
                $nom=$_POST['nom'];
                $login=$_POST['login'];
                $password=$_POST['password'];
                $mdp=$_POST['mdp'];
                
                
                if(isset($_GET["page"]))
                {
                        if ($_GET["page"]=="joueur") 
                        {
                                $role="joueur";
                        }
                        else
                        {
                                $role="admin";
                        }
                }
             

                // on vérifie si limage est na pas d'erreur
                if(isset($_FILES['image']) && $_FILES['image']['error']==0)
                {
                        
                      
  
                        $infosImage=pathinfo($_FILES['image']['name']);//c'est l'information de  l'image
                        // cad infoimage= photo.jpeg

                        $extensionImage=$infosImage['extension'];//c'est l'extention de l'image cad jpeg, png , jpg

                        $extensionAutorisee=[ "jpeg","jpg","png"];// tableau de l'extention (jpeg jpg png) autorisée

                        if(in_array($extensionImage,$extensionAutorisee))//on verifie si $extensionImage se trouve dans $extentionAutorisee

                        {
                         //on peut valider le fichier et le stocker définitivement       
                          move_uploaded_file($_FILES['image']['tmp_name'],'../imageTelecharge/'.basename($_FILES['image']['name']));

                          $cheminImage= '../imageTelecharge/'.basename($_FILES['image']['name']);// chemin de l'image a enregistre dans le cerveur
                        }else
                          {
                             echo "cette extention n'est pas autorisée";

                          }
                        

                    
                }else
                  {
                          echo" il y'a erreur d'image";
                  }
                   
                        

                

                $newperson=
                [
                        "prenom"=> "$prenom",
                        "nom"=> " $nom",
                        "login"=> "$login",
                        "password"=> "$password",
                        "confirmdp"=> "$mdp",
                        "role"=>"$role",
                        "avatar"=>"$cheminImage",
                ];
                
               
                $json[]=$newperson;
               
                $newpersonActuel=json_encode($json);
                
                file_put_contents($fichier,$newpersonActuel);
                header('location:../index.php');


               
        }else
          {
                echo"<p style='color:red'><strong> Tous les champs sont obligatoirs.</strong></p>";
          }
          
            

}       
 
?>




 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATION DE COMPTE UTILISATEUR</title>
    <link rel="stylesheet" href="../ASSET/CSS/compte-user.css">
</head>
<body>
    
<div class="general">
    <div><img src="../ASSET/IMG/logo-QuizzSA.png" alt=""style="width: 70px; height: 90px;"> <div>
    <div style="color:white; margin-top:-130px; text-align:center; font-size:30px"><h1>Le plaisir de jouer</h1></div></div>
</div>  <!-- fin div general-->
<div class="partiel">
        <div class="doudou"> <br>
                <div style="font-size:20px"> 
                        <div style="margin:0 40px"><strong>S'INSCRIRE</strong> </div>
                        <div style=" font-size:10px ;margin:0 40px">pour propoger des Quizz </div><br>
                        <div style="width:350px; border:rgba(0, 0, 0, 0.400) solid 1px"> </div> 
                        <form method="POST"action="" id="myform" enctype="multipart/form-data">
                                <label for="" style="margin:0 40px"> Prénom</label><br>
                                <input type="text" name="prenom" id="prenom"style=" margin:0 40px;width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                 <span id="prenom"></span><br>
                                <label for="" style="margin:0 40px">Nom</label><br>
                                <input type="text" name="nom" id="nom"style="margin:0 40px;width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"> <br> 
                                  <span id="nom"></span><br>
                                <div class="profil"><img src="" alt="" id="output"></div><!-- fin profil-->
                                <label for="" style="margin:0 40px">Login</label><br>
                                <input type="text" name="login" id="login"style="margin:0 40px;width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                  <span id="login"></span><br>
                                <label for="" style="margin:0 40px"> Password</label><br>
                                <input type="password" name="password" id="password" placeholder="****" style="margin:0 40px;width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                  <span id="password"></span><br>
                                <label for="" style="margin:0 40px">Confirmer password</label><br>
                                <input type="password" name="mdp" id="mdp" placeholder="****" style="margin:0 40px;width:250px; height:40px;border-radius:10px; bacground-color:blanchedalmond"><br>
                                  <span id="mdp"></span><br>
                                <input type="file" name="image" value="Choisir un fichier" style=" background-color: rgba(0, 128, 122, 0.774);margin:10px 300px;color:white "
                                accept="image/*"onchange="loadFile(event)"> <br>
                                <input type="submit" name="compte"  value="Creer compte" style="margin:10px 200px; background-color: rgba(0, 128, 122, 0.774);color:white ">
                        </form>

                        <script>
      var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

       <script >

       
                   // recuperation des inputs par les id
        var myform=document.getElementById('myform');
         myform.addEventListener('submit',function(e)
   
          {
                 var prenom=document.getElementById('prenom');
                 

                 var prenom_regex=/^[a-zA-Z-éêî][^.,?!*-/]+[^0-9]$/;
                 if(prenom.value=="")
               {
                 var prenom_error=document.getElementById('prenom_error');
                 event.preventDefault();
                 
                 prenom.style.border="solid 2px red";
              
               }else if(prenom_regex.test(prenom.value)==false)
               {
                var prenom_error=document.getElementById('prenom_error');
                 event.preventDefault();
                 prenom.style.border="solid 1px red";
                 
             }
             else{ }  

                 var nom=document.getElementById('nom');
                 var nom_regex=/^[a-zA-Z-éêî][^.,?!*-/]+[^0-9]$/;
                 if(nom.value=="")
              {
                 var nom_error=document.getElementById('nom_error');
                 event.preventDefault();
                 
                 nom.style.border="solid 2px red";
                 
  
              }else if( nom_regex.test(nom.value)==false)
                {
                 var nom_error=document.getElementById('nom_error');
                 event.preventDefault();
                 nom.style.border="solid 1px red";
                
                }
                else{ }
  
                
                  var login=document.getElementById('login')
                  var login_regex=/^[a-zA-Z-éêî][^.,?!*-/]+[^0-9]$/;
                  if(login.value=="")
                    {
                        var login_error=document.getElementById('login_error');
                        event.preventDefault() ;
                        
                        login.style.border= "solid 2px red";
  
                    }else if(login_regex.test(login.value)==false)
                       {
                          var login_error=document.getElementById('login_error');
                          event.preventDefault();
                          login.style.border="solid 1px red";
                        }else{ }
  
                          var password=document.getElementById('password')
                          var password_regex=/^[a-zA-Z0-9/s]+$/;
                          if(password.value=="")
                          {
                              var password_error=document.getElementById('password_error');
                              event.preventDefault() ;
                              
                              password.style.border= "solid 2px red";
  
                          }else if(password_regex.test(password.value)==false)
                          {
                              var password_error=document.getElementById('password_error');
                              event.preventDefault();
                            
                              password.style.border="solid 1px red";
                          }else{ }
                            var mdp=document.getElementById('mdp');
                            
                            if(mdp.value=="" )
                              {
                                  var mdp_error=document.getElementById('mdp_error');
                                  event.preventDefault();
                                 
                                  mdp.style.border="solid 2px red";
                              }
                              else if(mdp.value!==password.value)
                                {
                                  var mdp_error=document.getElementById('mdp_error');
                                  event.preventDefault();
                                  
                                  mdp.style.border="solid 1px red";
                                  
                                }
  
                    
                
             
           });
  

</script>
 



                </div><!-- fin font-->

        </div><!-- fin div doudou-->


</div> <!-- fin div partiel-->

</body>
</html>



