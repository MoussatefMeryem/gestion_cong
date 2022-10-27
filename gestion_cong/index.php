<?php
require_once("./config/helper.php");
require_once('./config/validation.php');
      
// if(isset($_SESSION["admin"]) || isset($_SESSION["rh"]) || isset($_SESSION["salarie"]) ){
     

//     header("location: admin/dashboard.php");
//     exit();
  

// }else{
    $login = new Login();
  $msg =$login->check();
// }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./styles/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
     <div class="container">
     <div  >
                                <?php
                       
                                    if(isset($msg)){

                                       
                        echo'  <div class="alert">
                        <strong>'.$msg.' </strong>.
                        </div>';

                                    }?>
                            </div>
                <h1>
                    <div class="titre">
                        <ul>
                            <li>B</li>
                            <li>i</li>
                            <li>e</li>
                            <li>n</li>
                            <li>v</li>
                            <li>e</li>
                            <li>n</li>
                            <li>u</li>
                            <li>e</li>
                            <li>!</li>
                        </ul>
                    </div>
                </h1>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="corps_formulaire">
                    <div class="input">
                    
                        <div class="boite">
                            <label >Nom</label>
                            <input type="text"  name="nom" placeholder="entrer votre nom" required>
                            <i class="fa-solid fa-user"></i>

                           
                        </div>
                        <div class="boite">
                            <label><abbr title="Numéro de somme">PPR</abbr></label>
                            <input type="password" name="ppr" placeholder="entrer votre code PPR"  required>
                            <i class="fa-solid fa-lock"></i>
                            
                      
                        </div>
                    </div>
                    
                    
                    
                       
                </div>
                    <div >
                        <input type="submit" class='btn' name="validation" value="connexion">
                    </div>
            </form> 
            </div>
                
     </div>
</body>
</html>
